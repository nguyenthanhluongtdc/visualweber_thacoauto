<?php

namespace Platform\DistributionSystem\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Platform\Base\Traits\EnumCastable;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Base\Models\BaseModel;
use Platform\Location\Models\City;

class DistributionSystem extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'app_distribution_systems';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'city_id',
        'status',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];

    /**
     * City function
     *
     * @return BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
