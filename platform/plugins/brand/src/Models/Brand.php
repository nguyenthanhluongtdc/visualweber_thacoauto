<?php

namespace Platform\Brand\Models;

use Platform\Base\Traits\EnumCastable;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Base\Models\BaseModel;
use Platform\CarCategory\Models\CarCategory;

class Brand extends BaseModel
{
    use EnumCastable;

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
        'description',
        'image',
        'tenant_id',
        'status',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];
    public function categories(){
        return $this->belongsToMany(CarCategory::class,'app_brand_categories','brand_id','category_id');
    }
}
