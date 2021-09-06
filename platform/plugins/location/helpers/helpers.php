<?php

use Platform\Base\Enums\BaseStatusEnum;
use Platform\Location\Repositories\Interfaces\CityInterface;

if (!function_exists('get_cities')) {
    /**
     * Undocumented function
     *
     * @return void
     */
    function get_cities(): array
    {
        
        return Location::getStates();
    }
}

if (!function_exists('get_cities_by_id')) {
    /**
     * Undocumented function
     *
     * @return void
     */
    function get_cities_by_id($id)
    {
        
        return Location::getStateNameById($id);
    }
}
