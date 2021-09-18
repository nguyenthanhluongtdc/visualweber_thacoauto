<?php

namespace Platform\Shareholder\Models;

use Platform\Base\Models\BaseModel;
use Platform\Slug\Traits\SlugTrait;
use Platform\Base\Traits\EnumCastable;
use Platform\Base\Enums\BaseStatusEnum;

class Shareholder extends BaseModel
{
    use EnumCastable, SlugTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'app_shareholders';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'status',
        'description',
        'image',
        'content',
        'file',
        'is_featured',
        'order',

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
        return $this->belongsToMany(ShareholderCategory::class, 'app__shareholder_category', 'category_id','shareholder_id')->with('slugable');;
    }
}
