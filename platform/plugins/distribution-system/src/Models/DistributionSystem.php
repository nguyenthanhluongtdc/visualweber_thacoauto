<?php

namespace Platform\DistributionSystem\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Platform\Base\Traits\EnumCastable;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Base\Models\BaseModel;

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
        'state_id',
        'image',
        'status',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];

    public function showrooms(): HasMany
    {
        return $this->hasMany(Showroom::class);
    }
}
