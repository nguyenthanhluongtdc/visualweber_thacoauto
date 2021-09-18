<?php

namespace Platform\Shareholder\Repositories\Caches;

use Platform\Support\Repositories\Caches\CacheAbstractDecorator;
use Platform\Shareholder\Repositories\Interfaces\ShareholderInterface;

class ShareholderCacheDecorator extends CacheAbstractDecorator implements ShareholderInterface
{
    public function getByCategoryId($categoryId, $paginate = 5)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
}
