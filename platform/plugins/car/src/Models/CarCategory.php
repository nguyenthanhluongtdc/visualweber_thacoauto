<?php

namespace Platform\Car\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Platform\Base\Traits\EnumCastable;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Base\Models\BaseModel;

class CarCategory extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'app_car_categories';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'parent_id',
        'description',
        'content',
        'author_id',
        'author_type',
        'order',
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

    protected static function boot()
    {
        parent::boot();

        self::deleting(function (CarCategory $category) {
            CarCategory::where('parent_id', $category->id)->delete();
        });
    }
}
