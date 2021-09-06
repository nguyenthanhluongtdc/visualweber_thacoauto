<?php

namespace Platform\Promotions\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Platform\Base\Traits\EnumCastable;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Base\Models\BaseModel;
use Platform\Car\Models\Car;
use Platform\Deposit\Models\Deposit;

class Promotions extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'app_promotions';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'order',
        'discount_percent',
        'max_discount',
        'direct_discount',
        'image',
        'status',
        'author_id',
        'author_type'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];

    public function cars(): BelongsToMany
    {
        return $this->belongsToMany(Car::class, 'app__promotion_cars', 'promotion_id');
    }

    public function deposits(): BelongsToMany
    {
        return $this->belongsToMany(Deposit::class, 'app__promotion_cars', 'promotion_id');
    }
}
