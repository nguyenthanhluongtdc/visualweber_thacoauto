<?php

namespace Platform\Vehicle\Models;

use Platform\Base\Traits\EnumCastable;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Base\Models\BaseModel;
use Platform\Brand\Models\Brand;
class Vehicle extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'app_vehicles';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'image',
        'status',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];
    public function brands(){
        return $this->belongsToMany(Brand::class,'app_vehicle_brands','vehicle_id','brand_id');
    }
}
