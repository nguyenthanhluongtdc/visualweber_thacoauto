<?php

namespace Platform\Deposit\Models;

use Platform\Base\Traits\EnumCastable;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Base\Models\BaseModel;

class DepositAccessories extends BaseModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'app_deposit_accessories';

    public $timestamps = false;
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        "price",
        "deposit_id",
    ];
}
