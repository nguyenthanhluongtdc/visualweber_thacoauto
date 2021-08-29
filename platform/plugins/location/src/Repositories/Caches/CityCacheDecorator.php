<?php

namespace Platform\Location\Repositories\Caches;

use Platform\Support\Repositories\Caches\CacheAbstractDecorator;
use Platform\Location\Repositories\Interfaces\CityInterface;

class CityCacheDecorator extends CacheAbstractDecorator implements CityInterface
{
    /**
     * {@inheritDoc}
     */
    public function filters($keyword, $limit = 10, array $with = [], array $select = ['cities.*'])
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
}
