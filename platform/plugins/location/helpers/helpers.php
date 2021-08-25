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
        return app(CityInterface::class)->advancedGet([
            'condition' => [
                'status' => BaseStatusEnum::PUBLISHED
            ],
            'select' => ['id', 'name']
        ])->pluck('name', 'id')->toArray() ?? [];
    }
}
