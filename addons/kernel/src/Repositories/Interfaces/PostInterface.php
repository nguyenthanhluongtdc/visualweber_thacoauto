<?php

namespace Platform\Kernel\Repositories\Interfaces;

use Platform\Blog\Repositories\Interfaces\PostInterface as BlogPostInterface;

interface PostInterface extends BlogPostInterface
{
    /**
     * @param array $categoryId
     * @param int $limit
     * @param array $with
     * @return mixed
     */
    public function getFeaturedByCategory($categoryId, int $limit = 5, array $with = []);

    
}
