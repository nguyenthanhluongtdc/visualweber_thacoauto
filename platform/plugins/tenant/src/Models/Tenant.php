<?php

namespace Platform\Tenant\Models;

use Platform\Base\Traits\EnumCastable;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Base\Models\BaseModel;

class Tenant extends BaseModel
{
    use EnumCastable;

    public $incrementing = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tenants';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'brand_id',
        'country_id',
        'status',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];

    public function domains(){
        return $this->hasMany(\Stancl\Tenancy\Database\Models\Domain::class);
    }

    public function brand(){
        return $this->belongsTo(\Platform\Brand\Models\Brand::class,'brand_id');
    }

    public function country(){
        return $this->belongsTo(\Platform\Location\Models\TinhThanhPho::class,'country_id','matp');
    }
}
