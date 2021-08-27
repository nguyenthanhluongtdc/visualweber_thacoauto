<?php 

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
      $vehiclesInterface = resolve('Platform\Vehicle\Repositories\Interfaces\VehicleInterface');
      $carInterface = resolve('Platform\Car\Repositories\Interfaces\CarInterface');
      $slugRepository = resolve('Platform\Slug\Repositories\Interfaces\SlugInterface');
      $carModel = new \Platform\Car\Models\Car;
      $vehicles = collect();
      $vehicleModel = new Platform\Vehicle\Models\Vehicle;
      if($brand){
         $slug = $slugRepository->getFirstBy(['key' => $brand, 'reference_type' => \Platform\Brand\Models\Brand::class]);
        if ($slug) {
            $vehicleModel = $vehicleModel->whereHas('brands',function($q) use ($slug){
               return $q->where('brand_id',$slug->reference_id);
            });
        }
      }
      if($vehicle){
         $slug = $slugRepository->getFirstBy(['key' => $vehicle, 'reference_type' => \Platform\Vehicle\Models\Vehicle::class]);
         if($slug){
            $vehicleModel = $vehicleModel->whereIn('id',[$slug->reference_id]);
         }
      }
      $vehicles = $vehiclesInterface->applyBeforeExecuteQuery($vehicleModel)->get();
      return ;
   }
}