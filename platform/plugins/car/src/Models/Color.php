<?php

namespace Platform\Car\Models;

use Platform\Base\Traits\EnumCastable;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Base\Models\BaseModel;

class Color extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'app_colors';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'code',
        'car_id',
        'status',
        'image',
        'author_id',
        'author_type'
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
