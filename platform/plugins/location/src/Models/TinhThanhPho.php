<?php

namespace Platform\Location\Models;

use Platform\Base\Models\BaseModel;

class TinhThanhPho extends BaseModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tinhthanhpho';

    /**
     * @var array
     */
    protected $fillable = [
        'matp',
        'name',
        'type',
    ];
}
