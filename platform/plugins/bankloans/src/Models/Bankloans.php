<?php

namespace Platform\Bankloans\Models;

use Platform\Base\Enums\BaseStatusEnum;
use Platform\Base\Models\BaseModel;
use Platform\Base\Traits\EnumCastable;

class Bankloans extends BaseModel
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'months',
        'floating_rate',
        'interest_rate',
        'bank_id',
        'percent_loans',
        'status',
    ];

    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bankloans';

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];
}
