<?php

namespace Platform\Car\Models;

use Platform\Base\Traits\EnumCastable;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Base\Models\BaseModel;

class Accessory extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'app_accessories';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'car_id',
        'status',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];
    public function car(){
        return $this->belongsTo(\Platform\Car\Models\Car::class,'car_id');
    }
}
