<?php
namespace Platform\Car\Http\Middleware;

use Closure;
use Platform\Base\Models\BaseModel;
use Platform\Car\Models\Car;

class CarTenant{
    public function handle($request, Closure $next)
    {
         Car::addGlobalScope('add_tenant', function ($builder) {
            $user = auth()->user();
            if($user && $user->tenant && $user->tenant->brand){
               $builder->where('brand_id',$user->tenant->brand->id)->orWhere('author_id',$user->id);
            }
         });
        return $next($request);
    }
}