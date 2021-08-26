<?php

namespace Platform\Car\Models;

use Platform\Base\Traits\EnumCastable;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Base\Models\BaseModel;

class Equipment extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'app_equipments';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'slug',
        'image',
        'status',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];

    public function cars(){
        return $this->belongsToMany(\Platform\Car\Models\Car::class,'app_car_equipments','equipment_id','car_id');
    }
}
