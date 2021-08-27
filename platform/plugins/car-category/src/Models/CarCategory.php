<?php

namespace Platform\CarCategory\Models;

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
        'description',
        'status',
        'parent_id'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];

    public function parent(){
        return $this->belongsTo(get_class($this),'parent_id');
    }
    public function childrens(){
        return $this->hasMany(get_class($this),'parent_id');
    }
    public function brands(){
        return $this->belongsToMany(\Platform\Brand\Models\Brand::class,'app_brand_categories','category_id','brand_id');
    }
}
