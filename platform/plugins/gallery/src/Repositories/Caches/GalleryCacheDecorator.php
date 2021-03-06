<?php

namespace Platform\Gallery\Repositories\Caches;

use Platform\Support\Repositories\Caches\CacheAbstractDecorator;
use Platform\Gallery\Repositories\Interfaces\GalleryInterface;

class GalleryCacheDecorator extends CacheAbstractDecorator implements GalleryInterface
{
    /**
     * {@inheritDoc}
     */
    public function getAll(array $with = ['slugable', 'user'])
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritDoc}
     */
    public function getDataSiteMap()
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritDoc}
     */
    public function getFeaturedGalleries($limit, array $with = ['slugable', 'user'])
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
}
