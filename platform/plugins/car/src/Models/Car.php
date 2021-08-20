<?php

namespace Platform\Car\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Platform\Base\Traits\EnumCastable;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Base\Models\BaseModel;

class Car extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'app_cars';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'parent_id',
        'description',
        'content',
        'feature_image',
        'author_id',
        'author_type',
        'order',
        'car_line_id',
        'status',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];

    /**
     * @return BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(CarCategory::class, 'parent_id')->withDefault();
    }

    /**
     * @return HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany(CarCategory::class, 'parent_id');
    }

    /**
     * @return BelongsToMany
     */
    public function carlines(): BelongsTo
    {
        return $this->belongsTo(CarLine::class);
    }
}
