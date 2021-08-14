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
                'posts.is_featured' => 1,
            ])
            ->join('post_categories', 'post_categories.post_id', '=', 'posts.id')
            ->join('categories', 'post_categories.category_id', '=', 'categories.id')
            ->whereIn('post_categories.category_id', $categoryId)
            ->select('posts.*')
            ->limit($limit)
            ->distinct()
            ->with(array_merge(['slugable'], $with))
            ->orderBy('posts.created_at', 'desc');

        return $this->applyBeforeExecuteQuery($data)->get();
    }
}
