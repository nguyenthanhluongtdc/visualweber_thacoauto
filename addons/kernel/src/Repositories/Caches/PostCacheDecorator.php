<?php

namespace Platform\Kernel\Repositories\Caches;

use Platform\Blog\Repositories\Caches\PostCacheDecorator as BlogPostCacheDecorator;

class PostCacheDecorator extends BlogPostCacheDecorator
{
    /**
     * {@inheritDoc}
     */
    public function getFeaturedByCategory($categoryId, int $limit = 5, array $condition = [], array $with = [])
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritDoc}
     */
    public function getFeaturedByCategoryWithProvinceId($categoryId, $provinceId, int $paginate = 5, array $with = [])
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }


    /**
     * {@inheritDoc}
     */
    public function getOnlyFeaturedByCategory($categoryId, int $limit = 5, array $with = [])
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritDoc}
     */
    public function getOnlyFeaturedByCategoryCreated($categoryId, int $limit = 5, $createdAt = null, array $with = [])
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritDoc}
     */
    public function getFirstVideoPost()
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritDoc}
     */
    public function getAllWithFeatured(int $limit = 5, array $except = [], array $with = [])
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    public function getSearchByCategoryAndFilter(array $filter = [], int $paginate = 6, int $limit = 5){
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    public function getFeaturedMember(int $paginate = 5, array $with = [])
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
    
}
