<?php

namespace Platform\Bankloans\Repositories\Caches;

use Platform\Support\Repositories\Caches\CacheAbstractDecorator;
use Platform\Bankloans\Repositories\Interfaces\BankloansInterface;

class BankloansCacheDecorator extends CacheAbstractDecorator implements BankloansInterface
{
    /**
     * {@inheritDoc}
     */
    public function getBankloansById($id)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
}
