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

if(!function_exists('get_distribution_system_by_state')){
    function get_distribution_system_by_state($state_id = null){
        if($state_id){
            return app(DistributionSystemInterface::class)->allBy([
                'state_id'=>$state_id
            ]);
        }
        return collect();
    }
}

if(!function_exists('get_showroom_by_state')){
    function get_showroom_by_state($state_id = null,$brand = null,$vehicle = null){
        $showroomModel = new \Platform\DistributionSystem\Models\Showroom;
        $showroomInterface = resolve('Platform\DistributionSystem\Repositories\Interfaces\ShowroomInterface');
        if($state_id){
            $showroomModel = $showroomModel->whereHas('distributionSystem',function($q) use ($state_id){
                return $q->where('state_id',$state_id);
            });
        }
        if($vehicle){
            $slugRepository = resolve('Platform\Slug\Repositories\Interfaces\SlugInterface');
            $slug = $slugRepository->getFirstBy(['key' => $vehicle, 'reference_type' => \Platform\Vehicle\Models\Vehicle::class]);
            if($slug){
                $showroomModel = $showroomModel->whereHas('showroomBrands',function($q) use ($slug){
                    return $q->whereIn('category_id',[$slug->reference_id]);
                });
            }
        }
        if($brand){
            $slugRepository = resolve('Platform\Slug\Repositories\Interfaces\SlugInterface');
            $slug = $slugRepository->getFirstBy(['key' => $brand, 'reference_type' => \Platform\Brand\Models\Brand::class]);
            if($slug){
                $showroomModel = $showroomModel->whereHas('showroomBrands',function($q) use ($slug){
                    return $q->whereIn('brand_id',[$slug->reference_id]);
                });
            }
        }
        return $showroomInterface->applyBeforeExecuteQuery($showroomModel)->get();
    }
}