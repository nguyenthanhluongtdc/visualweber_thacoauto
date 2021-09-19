<?php

namespace Platform\Kernel\Repositories\Eloquent;

use Platform\Base\Enums\BaseStatusEnum;
use Platform\Blog\Repositories\Eloquent\PostRepository as BlogPostRepository;

class PostRepository extends BlogPostRepository
{
    /**
     * {@inheritDoc}
     */
    public function getFeaturedByCategory($categoryId, int $limit = 5, array $condition = [], array $with = [])
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
            ->distinct()
            ->where($condition)
            ->with(array_merge(['slugable'], $with))
            ->orderBy('posts.is_featured', 'desc')
            ->orderBy('posts.order', 'desc')
            ->orderBy('posts.created_at', 'desc');

        return $this->applyBeforeExecuteQuery($data)->paginate($limit);
    }

    /**
     * {@inheritDoc}
     */
    public function getFeaturedByCategoryWithProvinceId($categoryId, $provinceId, int $paginate = 5, array $with = [])
    {
        if (!is_array($categoryId)) {
            $categoryId = [$categoryId];
        }

        $data = $this->model
            ->whereStatus(BaseStatusEnum::PUBLISHED)
            ->whereHas('categories', function ($q) use ($categoryId) {
                $q->whereIn('categories.id', $categoryId);
            })
            ->where('posts.city_id', $provinceId)
            ->select('posts.*')
            ->distinct()
            ->with(array_merge(['slugable'], $with))
            ->orderBy('posts.is_featured', 'desc')
            ->orderBy('posts.order', 'desc')
            ->orderBy('posts.created_at', 'desc');

        return $this->applyBeforeExecuteQuery($data)->paginate($paginate);
    }

    /**
     * {@inheritDoc}
     */
    public function getAllWithFeatured(int $limit = 5, array $except = [], array $with = [])
    {
        if (!is_array($except)) {
            $except = [$except];
        }
        $data = $this->model
            ->where([
                'posts.status'      => BaseStatusEnum::PUBLISHED,
            ]);
                $data->whereHas('categories', function ($q) use ($except) {
                    $q->whereNotIn('categories.id', $except);
                });
            $data->select('posts.*')
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
            ->whereStatus(BaseStatusEnum::PUBLISHED)
            ->whereHas('categories', function ($q) use ($categoryId) {
                $q->whereIn('categories.id', $categoryId);
            })
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
    public function getSearchByCategoryAndFilter($filter = [], $paginate = 6, $limit = 5)
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
    /**
     * {@inheritDoc}
     */
    public function getFeaturedMember(int $paginate = 5, array $with = [])
    {


        $data = $this->model
            ->whereStatus(BaseStatusEnum::PUBLISHED)
            ->where('is_featured_member', 1)
            ->select('posts.*')
            ->with(array_merge(['slugable'], $with))
            ->orderBy('posts.is_featured', 'desc')
            ->orderBy('posts.order', 'desc')
            ->orderBy('posts.created_at', 'desc');

        return $this->applyBeforeExecuteQuery($data)->paginate($paginate);
    }
}
