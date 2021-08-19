<?php

namespace Platform\Career\Models;

use Platform\Base\Models\BaseModel;
use Platform\Base\Traits\EnumCastable;
use Platform\Base\Enums\BaseStatusEnum;

class Career extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'careers';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'location',
        'salary',
        'description',
        'content',
        'status',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];
}
