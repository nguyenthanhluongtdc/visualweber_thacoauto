<?php

use Illuminate\Database\Eloquent\Collection;
use Platform\Car\Repositories\Interfaces\CarInterface;

if(!function_exists('get_car_lines')){
   function get_vehicles($brand = null){
      $vehiclesInterface = resolve('Platform\Vehicle\Repositories\Interfaces\VehicleInterface');
      if($brand){
         $slugRepository = resolve('Platform\Slug\Repositories\Interfaces\SlugInterface');
         $slug = $slugRepository->getFirstBy(['key' => $brand, 'reference_type' => \Platform\Brand\Models\Brand::class]);
        if (!$slug) {
            return collect();
        }
        $vehicleModel = new Platform\Vehicle\Models\Vehicle;
        $vehicleModel = $vehicleModel->whereHas('brands',function($q) use ($slug){
            return $q->where('brand_id',$slug->reference_id);
        });
        return $vehiclesInterface->applyBeforeExecuteQuery($vehicleModel)->get();
      }
      return $vehiclesInterface->all();
   }
}
if(!function_exists('get_cars')){
   function get_cars($brand = null, $vehicle = null){
      $carInterface = resolve('Platform\Car\Repositories\Interfaces\CarInterface');
      $slugRepository = resolve('Platform\Slug\Repositories\Interfaces\SlugInterface');
      $carModel = new \Platform\Car\Models\Car;
      if($brand){
         $slug = $slugRepository->getFirstBy(['key' => $brand, 'reference_type' => \Platform\Brand\Models\Brand::class]);
         if($slug){
            $carModel = $carModel->where('brand_id',$slug->reference_id);
         }
      }
      if($vehicle){
         $slug = $slugRepository->getFirstBy(['key' => $vehicle, 'reference_type' => \Platform\Vehicle\Models\Vehicle::class]);
         if($slug){
            $carModel = $carModel->where('vehicle_id',$slug->reference_id);
         }
      }
      return $carInterface->applyBeforeExecuteQuery($carModel)->get();;
   }
}

if(!function_exists('get_car_by_slug')){
   function get_car_by_slug($slug){
      $carInterface = resolve('Platform\Car\Repositories\Interfaces\CarInterface');
      $slugRepository = resolve('Platform\Slug\Repositories\Interfaces\SlugInterface');
      $slug = $slugRepository->getFirstBy(['key' => $slug, 'reference_type' => Platform\Car\Models\Car::class]);
      if ($slug) {
          return $carInterface->getFirstBy(['id' => $slug->reference_id]);
      }
      return null;
   }
}

if (!function_exists('get_car_by_id')) {
   /**
    * Get car by id function
    *
    * @param [type] $id
    * @return Collection
    */
   function get_car_by_id($id)
   {
      return app(CarInterface::class)->getFirstBy([
         "id" => $id
      ], ['*'], ['childrens', 'brand', 'colors', 'accessories', 'equipments']);
   }
}