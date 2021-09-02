<?php
namespace Platform\Car\Http\Middleware;

use Closure;
use Platform\Base\Models\BaseModel;
use Platform\Car\Models\Color;
use Platform\Car\Models\Equipment;
use Platform\Car\Models\Accessory;
use Platform\Car\Scopes\CarTenantScope;
class ModelRelationOfCarTenant{
    public function handle($request, Closure $next)
    {
         Color::addGlobalScope(new CarTenantScope);
         Equipment::addGlobalScope(new CarTenantScope);
         Accessory::addGlobalScope(new CarTenantScope);
         Accessory::addGlobalScope(new CarTenantScope);
        return $next($request);
    }
}