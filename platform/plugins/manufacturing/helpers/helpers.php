<?php

use Platform\Manufacturing\Repositories\Interfaces\ManufacturingInterface;

if (!function_exists('get_manufacturing_by_id')) {
    /**
     * @param integer $id
     * @return \Platform\Base\Models\BaseModel
     */
    function get_manufacturing_by_id($id)
    {
        return app(ManufacturingInterface::class)->getManufacturingById($id);
    }
}
