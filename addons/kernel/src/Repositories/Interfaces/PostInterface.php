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

    /**
     * @param array $categoryId
     * @param int $limit
     * @param array $with
     * @return mixed
     */
    public function getFeaturedByCategoryWithProvinceId($categoryId, $provinceId, int $paginate = 5, array $with = []);
    /**
     * @param array $categoryId
     * @param int $limit
     * @param array $with
     * @return mixed
     */
    public function getOnlyFeaturedByCategory($categoryId, int $limit = 5, array $with = []);

    /**
     * @param array $categoryId
     * @param int $limit
     * @param array $with
     * @return mixed
     */
    public function getOnlyFeaturedByCategoryCreated($categoryId, int $limit = 5, $createdAt = null, array $with = []);

    /**
     * Get first video post function
     *
     * @return void
     */
    public function getFirstVideoPost();

    /**
     * Get first video post function
     *
     * @return void
     */
    public function getAllWithFeatured(int $limit = 5, array $except = [], array $with = []);

    public function getSearchByCategoryAndFilter(array $filter = [], int $paginate = 6);
}
