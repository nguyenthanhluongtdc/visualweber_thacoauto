<?php

namespace Platform\Car\Models;

use Platform\Base\Traits\EnumCastable;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Base\Models\BaseModel;
use \Platform\Slug\Traits\SlugTrait;

class Car extends BaseModel
{
    use EnumCastable,SlugTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'app_cars';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'horse_power',
        'fuel_type',
        'gear',
        'fee',
        'fee_license_plate',
        'vehicle_id',
        'parent_id',
        'image',
        'brochure',
        'status',
        'brand_id'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];

    public function parent(){
        return $this->belongsTo(\Platform\Car\Models\Car::class,'parent_id');
    }
    public function vehicle(){
        return $this->belongsTo(\Platform\Vehicle\Models\Vehicle::class,'vehicle_id');
    }
    public function brand(){
        return $this->belongsTo(\Platform\Brand\Models\Brand::class,'brand_id');
    }
    public function colors(){
        return $this->hasMany(\Platform\Car\Models\Color::class,'car_id');
    }
    public function accessories(){
        return $this->hasMany(\Platform\Car\Models\Accessory::class,'car_id');
    }
    public function equipments(){
        return $this->belongsToMany('app_car_equipments',\Platform\Car\Models\Equipment::class,'car_id','equipment_id');
    }
    public function childrens(){
        return $this->hasMany(\Platform\Car\Models\Car::class,'parent_id');
    }
}
