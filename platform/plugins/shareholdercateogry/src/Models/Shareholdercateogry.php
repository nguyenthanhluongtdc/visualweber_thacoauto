<?php

namespace Platform\Shareholdercateogry\Models;

use Platform\Base\Models\BaseModel;
use Platform\Slug\Traits\SlugTrait;
use Platform\Base\Traits\EnumCastable;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Shareholder\Models\Shareholder;

class Shareholdercateogry extends BaseModel
{
    use EnumCastable, SlugTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'app_shareholdercateogries';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'status',
        'description',
        'image',
        'status',
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
    public function shareholders(): BelongsToMany
    {
        return $this->belongsToMany(Shareholder::class, 'app__shareholder_category', 'category_id', 'shareholder_id')->with('slugable');
    }
}
