<?php

namespace Platform\Location\Models;

use Platform\Base\Traits\EnumCastable;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Base\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class State extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'states';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'abbreviation',
        'country_id',
        'order',
        'is_default',
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
    public function country()
    {
        return $this->belongsTo(Country::class)->withDefault();
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function (State $state) {
            City::where('state_id', $state->id)->delete();
        });
    }
}
