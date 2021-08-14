<?php

namespace Theme\Thaco\Repositories\Caches;

use Platform\Blog\Repositories\Caches\PostCacheDecorator as CachesPostCacheDecorator;
use Platform\Blog\Repositories\Interfaces\PostInterface;
use Platform\Support\Repositories\Caches\CacheAbstractDecorator;
use Theme\Thaco\Repositories\Interfaces\PostInterface as InterfacesPostInterface;

abstract class PostCacheDecorator extends CacheAbstractDecorator implements InterfacesPostInterface
{
    /**
     * {@inheritDoc}
     */
    public function getFeaturedByCategory($categoryId, int $limit = 5, array $with = [])
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

}
