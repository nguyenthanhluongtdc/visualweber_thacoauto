<?php

namespace Platform\Deposit\Models;

use Platform\Base\Traits\EnumCastable;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Base\Models\BaseModel;

class Deposit extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'app_deposits';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'status',
        "phone",
        "email",
        "note",
        "showroom_id",
        "car_id",
        "color_id",
        "price",
        "fee",
        "fee_license_plate",
        "promotion",
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];
}
