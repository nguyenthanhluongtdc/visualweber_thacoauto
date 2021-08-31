<?php

namespace Platform\Bank\Repositories\Caches;

use Platform\Support\Repositories\Caches\CacheAbstractDecorator;
use Platform\Bank\Repositories\Interfaces\BankInterface;

class BankCacheDecorator extends CacheAbstractDecorator implements BankInterface
{

}
