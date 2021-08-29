<?php

namespace Platform\DistributionSystem\Models;

use Platform\Base\Traits\EnumCastable;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Base\Models\BaseModel;

class Showroom extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'app_showrooms';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'distribution_system_id',
        'status',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];

    public function distributionSystem(){
        return $this->belongsTo(\Platform\DistributionSystem\Models\DistributionSystem::class,'distribution_system_id');
    }

    public function showroomBrands(){
        return $this->hasMany(\Platform\DistributionSystem\Models\ShowroomBrand::class,'showroom_id');
    }
    
}
