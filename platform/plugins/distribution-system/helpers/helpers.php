<?php

use Illuminate\Database\Eloquent\Collection;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\DistributionSystem\Repositories\Interfaces\DistributionSystemInterface;

if(!function_exists('get_distribution_systems')) {
    /**
     * Get distribution system function
     *
     * @return void
     */
    function get_distribution_systems(): Collection
    {
        return app(DistributionSystemInterface::class)
            ->advancedGet([
                "condition" => [
                    "status" => BaseStatusEnum::PUBLISHED
                ]
            ]);
    }
}