<?php

namespace Platform\TestDrive\Models;

use Platform\Base\Traits\EnumCastable;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Base\Models\BaseModel;

class TestDrive extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'app_test_drives';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'type_register',
        'vocative',
        'phone',
        'email',
        'province_id',
        'district_id',
        'showroom_id',
        'brand_id',
        'time',
        'want_to_buy_id',
        'test_drive_id',
        'status',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];
}
