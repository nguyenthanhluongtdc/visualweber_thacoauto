<?php

namespace Platform\Car\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Platform\Base\Traits\EnumCastable;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Base\Models\BaseModel;
use \Platform\Slug\Traits\SlugTrait;

class Car extends BaseModel
{
    use EnumCastable, SlugTrait;

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
        'description',
        'horse_power',
        'fuel_type',
        'gear',
        'fee',
        'fee_license_plate',
        'vehicle_id',
        'parent_id',
        'image',
        'brochure',
        'status',
        'brand_id',
        'engine',
        'price'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];

    /**
     * Parent function
     *
     * @return BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(\Platform\Car\Models\Car::class, 'parent_id');
    }

    /**
     * Vehicle function
     *
     * @return BelongsTo
     */
    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(\Platform\Vehicle\Models\Vehicle::class, 'vehicle_id');
    }

    /**
     * Brand function
     *
     * @return BelongsTo
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(\Platform\Brand\Models\Brand::class, 'brand_id');
    }

    /**
     * Colors function
     *
     * @return HasMany
     */
    public function colors(): HasMany
    {
        return $this->hasMany(\Platform\Car\Models\Color::class, 'car_id');
    }

    /**
     * Accessories function
     *
     * @return HasMany
     */
    public function accessories(): HasMany
    {
        return $this->hasMany(\Platform\Car\Models\Accessory::class, 'car_id');
    }

    /**
     * Equipments function
     *
     * @return BelongsToMany
     */
    public function equipments(): BelongsToMany
    {
        return $this->belongsToMany(\Platform\Car\Models\Equipment::class, 'app_car_equipments', 'car_id', 'equipment_id');
    }

    /**
     * Childrens function
     *
     * @return HasMany
     */
    public function childrens(): HasMany
    {
        return $this->hasMany(\Platform\Car\Models\Car::class, 'parent_id');
    }

    /**
     * 
     */
    public function showrooms(){
        return $this->belongsToMany(\Platform\DistributionSystem\Models\Showroom::class,'app_car_showrooms','car_id','showroom_id');
    }
}
