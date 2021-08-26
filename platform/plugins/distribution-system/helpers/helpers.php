<?php

use Illuminate\Database\Eloquent\Collection;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\DistributionSystem\Models\Showroom;
use Platform\DistributionSystem\Models\ShowroomBrand;
use Platform\DistributionSystem\Repositories\Interfaces\DistributionSystemInterface;
use Platform\DistributionSystem\Repositories\Interfaces\ShowroomBrandInterface;
use Platform\DistributionSystem\Repositories\Interfaces\ShowroomInterface;

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

if(!function_exists('get_brand_of_distribution')) {
    /**
     * Get brand of distribution function
     *
     * @param [type] $id
     * @return Collection
     */
    function get_brand_of_distribution($id): Collection
    {
        $ids = app(ShowroomInterface::class)->advancedGet([
            "condition" => [
                "status" => BaseStatusEnum::PUBLISHED,
                "distribution_system_id" => $id
            ],
            "select" => ["id"]
        ])->pluck('id')->toArray() ?? [];

        $collection = app(ShowroomBrandInterface::class)->getBrandGroupByCategory($ids);

        return $collection->groupBy('category.name') ?? collect();
    }
}