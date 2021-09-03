<?php

namespace Platform\Car\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\DB;

class CarTenantScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        if($model instanceof \Platform\Car\Models\Equipment){
            $user = auth()->user();
            if($user && $user->tenant && $user->tenant->brand){
                $car_ids = $user->tenant->brand->cars->pluck('id')->toArray() ?? [];
                $equipment_ids = DB::table('app_car_equipments')->whereIn('car_id',$car_ids)->pluck('equipment_id')->toArray();
                $builder->whereIn('id',$equipment_ids)->orWhere('author_id',$user->id);
            }
        }else{
            $user = auth()->user();
            if($user && $user->tenant && $user->tenant->brand){
                $car_ids = $user->tenant->brand->cars->pluck('id')->toArray() ?? [];
                $builder->whereIn('car_id',$car_ids)->orWhere('author_id',$user->id);
            }
        }
    }
}