<?php

namespace Platform\Car\Models;

use Platform\Base\Models\BaseModel;
use Platform\Slug\Traits\SlugTrait;
use Platform\Base\Traits\EnumCastable;
use Platform\Base\Enums\BaseStatusEnum;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Brand extends BaseModel
{
    use EnumCastable, SlugTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'app_brands';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'content',
        'image',
        'status',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];

    /**
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(CarCategory::class, 'app__brand_car_categories');
    }
}
