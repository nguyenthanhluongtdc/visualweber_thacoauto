<?php

namespace Platform\DistributionSystem\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Platform\Base\Traits\EnumCastable;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Base\Models\BaseModel;
use Platform\Brand\Models\Brand;
use Platform\CarCategory\Models\CarCategory;

class ShowroomBrand extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'app_showroom_brands';

    /**
     * @var array
     */
    protected $fillable = [
        'category_id',
        'brand_id',
        'showroom_id',
        'status',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];

    /**
     * Brand function
     *
     * @return BelongsTo
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    /**
     * Showroom function
     *
     * @return BelongsTo
     */
    public function showroom(): BelongsTo
    {
        return $this->belongsTo(Showroom::class, 'showroom_id', 'id');
    }

    /**
     * Category function
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(CarCategory::class, 'category_id', 'id');
    }
}
