<?php


namespace Kjmtrue\VietnamZone\Models;

use Platform\Base\Models\BaseModel;

class District extends BaseModel {

    protected $table;

    public function __construct()
    {
        $this->table = config('vietnam-zone.tables.districts');
    }
}