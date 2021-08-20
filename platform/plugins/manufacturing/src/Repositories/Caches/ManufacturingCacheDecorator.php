<?php

namespace Platform\Manufacturing\Repositories\Caches;

use Platform\Support\Repositories\Caches\CacheAbstractDecorator;
use Platform\Manufacturing\Repositories\Interfaces\ManufacturingInterface;

class ManufacturingCacheDecorator extends CacheAbstractDecorator implements ManufacturingInterface
{
    /**
     * {@inheritDoc}
     */
    public function getManufacturingById($id)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
}
