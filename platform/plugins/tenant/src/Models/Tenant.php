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
}
