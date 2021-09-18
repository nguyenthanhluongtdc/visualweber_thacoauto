<?php

namespace Platform\Shareholdercateogry\Repositories\Caches;

use Platform\Support\Repositories\Caches\CacheAbstractDecorator;
use Platform\Shareholdercateogry\Repositories\Interfaces\ShareholdercateogryInterface;

class ShareholdercateogryCacheDecorator extends CacheAbstractDecorator implements ShareholdercateogryInterface
{
    /**
     * {@inheritDoc}
     */
    public function getAllCategories()
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
}
