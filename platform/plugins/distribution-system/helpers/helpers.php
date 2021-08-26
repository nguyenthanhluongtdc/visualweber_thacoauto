<?php

use Platform\Base\Enums\BaseStatusEnum;
use Platform\DistributionSystem\Repositories\Interfaces\DistributionSystemInterface;
if (!function_exists('get_distribution_systems')) {
    /**
     * @param int $limit
     * @param array $with
     * @return \Illuminate\Support\Collection
     */
    function get_distribution_systems($cityId)
    {
        return app(DistributionSystemInterface::class)->advancedGet(['condition' => [
            'status' => BaseStatusEnum::PUBLISHED,
            'city_id' => $cityId
        ]]);
    }
}