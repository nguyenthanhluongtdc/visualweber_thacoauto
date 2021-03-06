<?php

namespace Platform\DistributionSystem\Repositories\Caches;

use Platform\Support\Repositories\Caches\CacheAbstractDecorator;
use Platform\DistributionSystem\Repositories\Interfaces\ShowroomBrandInterface;

class ShowroomBrandCacheDecorator extends CacheAbstractDecorator implements ShowroomBrandInterface
{
    /**
     * {@inheritDoc}
     */
    public function getBrandGroupByCategory($ids)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
}
