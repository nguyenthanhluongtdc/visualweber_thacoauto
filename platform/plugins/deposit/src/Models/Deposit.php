<?php

namespace Platform\Deposit\Models;

use Platform\Base\Models\BaseModel;
use Platform\Base\Traits\EnumCastable;
use Platform\Base\Enums\BaseStatusEnum;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Platform\Promotions\Models\Promotions;

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
        "city_id",
        "type_paynent",
        "price_discount_total",
        "total_price",
        "bank_id",
        "loan_month",
        "percent_loan",
        'interest_rate',
        'status',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];

    // public function promotions(): BelongsToMany
    // {
    //     return $this->belongsToMany(Promotions::class, 'app__promotion_deposit', 'deposit_id','promotion_id');
    // }
}
