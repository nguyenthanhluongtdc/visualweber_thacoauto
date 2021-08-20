<?php

namespace Platform\Tenant\Repositories\Caches;

use Platform\Support\Repositories\Caches\CacheAbstractDecorator;
use Platform\Tenant\Repositories\Interfaces\TenantInterface;

class TenantCacheDecorator extends CacheAbstractDecorator implements TenantInterface
{
}
