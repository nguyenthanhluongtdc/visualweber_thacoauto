<?php

namespace Platform\Kernel\Repositories\Eloquent;

use Platform\Base\Enums\BaseStatusEnum;
use Platform\Blog\Repositories\Eloquent\PostRepository as BlogPostRepository;

class PostRepository extends BlogPostRepository
{
    /**
     * {@inheritDoc}
     */
    public function getFeaturedByCategory($categoryId, int $limit = 5, array $with = [])
    {
        if (!is_array($categoryId)) {
            $categoryId = [$categoryId];
        }

        $data = $this->model
            ->where([
                'posts.status'      => BaseStatusEnum::PUBLISHED,
            ])
            ->join('post_categories', 'post_categories.post_id', '=', 'posts.id')
            ->join('categories', 'post_categories.category_id', '=', 'categories.id')
            ->whereIn('post_categories.category_id', $categoryId)
            ->select('posts.*')
            ->limit($limit)
            ->distinct()
            ->with(array_merge(['slugable'], $with))
            ->orderBy('posts.is_featured', 'desc')
            ->orderBy('posts.order', 'desc')
            ->orderBy('posts.created_at', 'desc');

        return $this->applyBeforeExecuteQuery($data)->get();
    }

    /**
     * {@inheritDoc}
     */
    public function getAllWithFeatured(int $limit = 5, array $with = [])
    {

        $data = $this->model
            ->where([
                'posts.status'      => BaseStatusEnum::PUBLISHED,
            ])
            ->select('posts.*')
            ->limit($limit)
            ->with(array_merge(['slugable'], $with))
            ->orderBy('posts.is_featured', 'desc')
            ->orderBy('posts.order', 'desc')
            ->orderBy('posts.created_at', 'desc');

        return $this->applyBeforeExecuteQuery($data)->get();
    }

    /**
     * {@inheritDoc}
     */
    public function getOnlyFeaturedByCategory($categoryId, int $limit = 5, array $with = [])
    {
        if (!is_array($categoryId)) {
            $categoryId = [$categoryId];
        }

        $data = $this->model
            ->where([
                'posts.status'      => BaseStatusEnum::PUBLISHED,
            ])
            ->join('post_categories', 'post_categories.post_id', '=', 'posts.id')
            ->join('categories', 'post_categories.category_id', '=', 'categories.id')
            ->whereIn('post_categories.category_id', $categoryId)
            ->where('posts.is_featured', 1)
            ->select('posts.*')
            ->limit($limit)
            ->distinct()
            ->with(array_merge(['slugable'], $with))
            ->orderBy('posts.created_at', 'desc');

        return $this->applyBeforeExecuteQuery($data)->get();
    }

    /**
     * {@inheritDoc}
     */
    public function getOnlyFeaturedByCategoryCreated($categoryId, int $limit = 5, $createdAt = null, array $with = [])
    {
        if (!is_array($categoryId)) {
            $categoryId = [$categoryId];
        }

        $data = $this->getModel()
            ->whereHas('categories', function ($q) use ($categoryId) {
                $q->whereIn('categories.id', $categoryId);
            })
            ->with(array_merge(['slugable'], $with))
            ->whereStatus(BaseStatusEnum::PUBLISHED)
            ->orderBy('is_featured', 'desc')
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc');

        return $this->applyBeforeExecuteQuery($data)->paginate($limit);
    }

    /**
     * {@inheritDoc}
     */
    public function getFirstVideoPost()
    {
        $data = $this->getModel()
            ->where('format_type', 'video')
            ->whereStatus(BaseStatusEnum::PUBLISHED)
            ->orderBy('is_featured', 'desc')
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc');

        return $this->applyBeforeExecuteQuery($data)->first();
    }

    /**
     * {@inheritDoc}
     */
    public function getSearchByCategoryAndFilter($filter = [], $paginate = 6)
    {
        if (!is_array($filter['category'])) {
            $categoryId = [$filter['category']];
        }
        
        $data = $this->getModel()
            ->where('posts.status', BaseStatusEnum::PUBLISHED)
            ->join('post_categories', 'post_categories.post_id', '=', 'posts.id')
            ->join('categories', 'post_categories.category_id', '=', 'categories.id')
            ->where('posts.name', 'LIKE', '%' . $filter['keyword'] . '%')
            ->select('posts.*')
            ->distinct()
            ->with('slugable')
            ->orderBy('posts.order', 'desc')
            ->orderBy('posts.created_at', 'desc');

            if($filter['category']) {
                $data->whereIn('post_categories.category_id', $categoryId);
            }

            if($filter['birthday']) {
                $data->where('posts.created_at', '>=', $filter['birthday']);
            }

            if ($paginate != 0) {
                return $this->applyBeforeExecuteQuery($data)->paginate($paginate);
            }
    
            return $this->applyBeforeExecuteQuery($data)->limit($limit)->get();
    }
}
