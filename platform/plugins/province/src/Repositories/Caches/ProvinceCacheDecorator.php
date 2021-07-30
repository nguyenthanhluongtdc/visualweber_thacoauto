<?php

namespace Platform\Province\Repositories\Caches;

use Platform\Support\Repositories\Caches\CacheAbstractDecorator;
use Platform\Province\Repositories\Interfaces\ProvinceInterface;

class ProvinceCacheDecorator extends CacheAbstractDecorator implements ProvinceInterface
{
     /**
     * {@inheritDoc}
     */
    public function getAllProvince($active = true)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

}
