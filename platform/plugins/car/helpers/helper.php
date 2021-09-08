<?php

use Illuminate\Database\Eloquent\Collection;
use Platform\Bank\Repositories\Interfaces\BankInterface;
use Platform\Bankloans\Repositories\Interfaces\BankloansInterface;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Base\Supports\SortItemsWithChildrenHelper;
use Platform\Car\Repositories\Interfaces\CarInterface;
use Platform\Car\Repositories\Interfaces\ColorInterface;
use Platform\Deposit\Models\DepositAccessories;
use Platform\Deposit\Models\DepositEquipment;
use Platform\Deposit\Models\DepositPromotion;

if (!function_exists('get_car_lines')) {
   function get_vehicles($brand = null)
   {
      $vehiclesInterface = resolve('Platform\Vehicle\Repositories\Interfaces\VehicleInterface');
      if ($brand) {
         $slugRepository = resolve('Platform\Slug\Repositories\Interfaces\SlugInterface');
         $slug = $slugRepository->getFirstBy(['key' => $brand, 'reference_type' => \Platform\Brand\Models\Brand::class]);
         if (!$slug) {
            return collect();
         }
         $vehicleModel = new Platform\Vehicle\Models\Vehicle;
         $vehicleModel = $vehicleModel->whereHas('brands', function ($q) use ($slug) {
            return $q->where('brand_id', $slug->reference_id);
         });
         return $vehiclesInterface->applyBeforeExecuteQuery($vehicleModel)->get();
      }
      return $vehiclesInterface->all();
   }
}
if (!function_exists('get_cars')) {
   function get_cars($brand = null, $vehicle = null, $request = null)
   {
      $carInterface = resolve('Platform\Car\Repositories\Interfaces\CarInterface');
      $slugRepository = resolve('Platform\Slug\Repositories\Interfaces\SlugInterface');
      $carModel = new \Platform\Car\Models\Car;
      // $carModel = $carModel->addGlobalScope(new Platform\Car\Scopes\CarTenantScope);
      /**
       *
       */
      if ($request instanceof \Illuminate\Http\Request) {
         $slugRepository = resolve('Platform\Slug\Repositories\Interfaces\SlugInterface');
         if ($request->get('horse_power')) {
            $carModel = $carModel->where('horse_power', $request->get('horse_power'));
         }
         if ($request->get('vehicle')) {
            $slug = $slugRepository->getFirstBy(['key' => $request->get('vehicle'), 'reference_type' => \Platform\Vehicle\Models\Vehicle::class]);
            if ($slug) {
               $carModel = $carModel->whereHas('vehicle', function ($q) use ($slug) {
                  return $q->whereIn('id', [$slug->reference_id]);
               });
            }
         }
         if ($request->get('engine')) {
            $carModel = $carModel->where('engine', $request->get('engine'));
         }
         if ($request->get('color')) {
            $carModel = $carModel->whereHas('colors', function ($q) use ($request) {
               return $q->where('code', $request->get('color'));
            });
         }
         if ($request->get('fuel_type')) {
            $carModel = $carModel->where('fuel_type', $request->get('fuel_type'));
         }
         if ($request->get('gear')) {
            $carModel = $carModel->where('gear', $request->get('gear'));
         }
         if ($request->get('price')) {
            $carModel = $carModel->where('price', '<=', $request->get('price'));
         }
         if ($request->get('showroom')) {
            $slug = $slugRepository->getFirstBy(['key' => $request->get('showroom'), 'reference_type' => \Platform\DistributionSystem\Models\Showroom::class]);
            if ($slug) {
               $carModel = $carModel->whereHas('showrooms', function ($q) use ($slug) {
                  return $q->whereIn('showroom_id', [$slug->reference_id]);
               });
            }
         }
      }
      //
      if ($brand) {
         $slug = $slugRepository->getFirstBy(['key' => $brand, 'reference_type' => \Platform\Brand\Models\Brand::class]);
         if ($slug) {
            $carModel = $carModel->where('brand_id', $slug->reference_id);
         }
      }
      if ($vehicle) {
         $slug = $slugRepository->getFirstBy(['key' => $vehicle, 'reference_type' => \Platform\Vehicle\Models\Vehicle::class]);
         if ($slug) {
            $carModel = $carModel->where('vehicle_id', $slug->reference_id);
         }
      }
      return $carInterface->applyBeforeExecuteQuery($carModel)->get();
   }
}

if (!function_exists('get_cars_no_children')) {
   function get_cars_no_children($brand = null, $vehicle = null, $request = null)
   {
      $carInterface = resolve('Platform\Car\Repositories\Interfaces\CarInterface');
      $slugRepository = resolve('Platform\Slug\Repositories\Interfaces\SlugInterface');
      $carModel = new \Platform\Car\Models\Car;
      $carModel = $carModel->where('parent_id', null);
      // $carModel = $carModel->addGlobalScope(new Platform\Car\Scopes\CarTenantScope);
      /**
       *
       */
      if ($request instanceof \Illuminate\Http\Request) {
         $slugRepository = resolve('Platform\Slug\Repositories\Interfaces\SlugInterface');
         if ($request->get('horse_power')) {
            $carModel = $carModel->where('horse_power', $request->get('horse_power'));
         }
         if ($request->get('vehicle')) {
            $slug = $slugRepository->getFirstBy(['key' => $request->get('vehicle'), 'reference_type' => \Platform\Vehicle\Models\Vehicle::class]);
            if ($slug) {
               $carModel = $carModel->whereHas('vehicle', function ($q) use ($slug) {
                  return $q->whereIn('id', [$slug->reference_id]);
               });
            }
         }
         if ($request->get('engine')) {
            $carModel = $carModel->where('engine', $request->get('engine'));
         }
         if ($request->get('color')) {
            $carModel = $carModel->whereHas('colors', function ($q) use ($request) {
               return $q->where('code', $request->get('color'));
            });
         }
         if ($request->get('fuel_type')) {
            $carModel = $carModel->where('fuel_type', $request->get('fuel_type'));
         }
         if ($request->get('gear')) {
            $carModel = $carModel->where('gear', $request->get('gear'));
         }
         if ($request->get('price')) {
            $carModel = $carModel->where('price', '<=', $request->get('price'));
         }
         if ($request->get('showroom')) {
            $slug = $slugRepository->getFirstBy(['key' => $request->get('showroom'), 'reference_type' => \Platform\DistributionSystem\Models\Showroom::class]);
            if ($slug) {
               $carModel = $carModel->whereHas('showrooms', function ($q) use ($slug) {
                  return $q->whereIn('showroom_id', [$slug->reference_id]);
               });
            }
         }
      }
      //
      if ($brand) {
         $slug = $slugRepository->getFirstBy(['key' => $brand, 'reference_type' => \Platform\Brand\Models\Brand::class]);
         if ($slug) {
            $carModel = $carModel->where('brand_id', $slug->reference_id);
         }
      }
      if ($vehicle) {
         $slug = $slugRepository->getFirstBy(['key' => $vehicle, 'reference_type' => \Platform\Vehicle\Models\Vehicle::class]);
         if ($slug) {
            $carModel = $carModel->where('vehicle_id', $slug->reference_id);
         }
      }
      return $carInterface->applyBeforeExecuteQuery($carModel)->get();
   }
}

if (!function_exists('get_car_by_slug')) {
   function get_car_by_slug($slug)
   {
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

if (!function_exists('get_horse_power_by_brand_and_vehicle')) {
   function get_horse_power_by_brand_and_vehicle($brand = null, $vehicle = null)
   {
      $cars = get_cars($brand, $vehicle, null);
      if (count($cars)) {
         return $cars->pluck('horse_power')->toArray();
      }
      return collect();
   }
}

if (!function_exists('get_equipment_by_brand_and_vehicle')) {
   function get_equipment_by_brand_and_vehicle($brand = null, $vehicle = null)
   {
      $cars = get_cars($brand, $vehicle, null);
      if (count($cars)) {
         $equipmentIds = [];
         foreach ($cars as $car) {
            $equipmentIds = array_merge($car->equipments->pluck('id')->toArray(), $equipmentIds);
         }
         $equipmentInterface = app(\Platform\Car\Repositories\Interfaces\EquipmentInterface::class);
         $equipmentModel = new \Platform\Car\Models\Equipment;
         $equipmentModel = $equipmentModel->whereIn('id', $equipmentIds);
         return $equipmentInterface->applyBeforeExecuteQuery($equipmentModel)->get();
      }
      return collect();
   }
}

if (!function_exists('get_color_by_brand_and_vehicle')) {
   function get_color_by_brand_and_vehicle($brand = null, $vehicle = null)
   {
      $cars = get_cars($brand, $vehicle, null);
      if (count($cars)) {
         $ids = [];
         foreach ($cars as $car) {
            $ids = array_merge($car->colors->pluck('id')->toArray(), $ids);
         }
         $colorInterface = app(\Platform\Car\Repositories\Interfaces\ColorInterface::class);
         $colorModel = new \Platform\Car\Models\Color;
         $colorModel = $colorModel->whereIn('id', $ids);
         return $colorInterface->applyBeforeExecuteQuery($colorModel)->get();
      }
      return collect();
   }
}

if (!function_exists('get_engine_by_brand_and_vehicle')) {
   function get_engine_by_brand_and_vehicle($brand = null, $vehicle = null)
   {
      $cars = get_cars($brand, $vehicle, null);
      if (count($cars)) {
         return $cars->pluck('engine')->toArray();
      }
      return collect();
   }
}

if (!function_exists('get_car_relations')) {
   function get_car_relations($brand = null, $limit = 4)
   {
      if ($brand) {
         $carInterface = resolve('Platform\Car\Repositories\Interfaces\CarInterface');
         $brandInterface = resolve('Platform\Brand\Repositories\Interfaces\BrandInterface');
         $allBrand = $brandInterface->all();
         $cars = [];
         foreach ($allBrand as $brand) {
            $cars = array_merge($brand->cars->pluck('id')->toArray(), $cars);
         }
         $carModel = \Platform\Car\Models\Car::whereIn('id', $cars);
         return $carInterface->applyBeforeExecuteQuery($carModel)->limit($limit)->get();
      }
      return collect();
   }
}
if (!function_exists('get_countries')) {
   function get_countries()
   {
      return \Illuminate\Support\Facades\DB::table('tinhthanhpho')->get();
   }
}

if (!function_exists('get_cars_with_children')) {
   /**
    * @return \Illuminate\Support\Collection
    * @throws Exception
    */
   function get_cars_with_children()
   {
      $user = auth()->user();
      $interface = app(CarInterface::class);

      $data = $interface->getModel()
         ->where(['status' => BaseStatusEnum::PUBLISHED], [], ['id', 'name', 'parent_id']);
         

      if($user && $user->tenant && $user->tenant->brand){
            $car_ids = $user->tenant->brand->cars->pluck('id')->toArray() ?? [];
            $data = $data->whereIn('id',$car_ids);
      }

      $data = $data->with([])->select(['*']);
      $cars = $interface->applyBeforeExecuteQuery($data)->get();

      return app(SortItemsWithChildrenHelper::class)
         ->setChildrenProperty('childrents')
         ->setItems($cars)
         ->sort();
   }
}

if (!function_exists('get_color_by_id')) {
   /**
    * @return \Illuminate\Support\Collection
    * @throws Exception
    */
   function get_color_by_id($id)
   {
      return app(ColorInterface::class)->getFirstBy([
         "id" => $id
      ]);
   }
}

if (!function_exists('get_deposit_equipments_by_id')) {
   /**
    * @return \Illuminate\Support\Collection
    * @throws Exception
    */
   function get_deposit_equipments_by_id($id)
   {
      return app(DepositEquipment::class)
      ->where("deposit_id", $id)->get();
   }
}

if (!function_exists('get_deposit_accessories_by_id')) {
   /**
    * @return \Illuminate\Support\Collection
    * @throws Exception
    */
   function get_deposit_accessories_by_id($id)
   {
      return app(DepositAccessories::class)
      ->where("deposit_id", $id)->get();
   }
}

if (!function_exists('get_deposit_promotions_by_id')) {
   /**
    * @return \Illuminate\Support\Collection
    * @throws Exception
    */
   function get_deposit_promotions_by_id($id)
   {
      return app(DepositPromotion::class)
      ->where("deposit_id", $id)->get();
   }
}

if (!function_exists('get_bank_by_id')) {
   /**
    * @return \Illuminate\Support\Collection
    * @throws Exception
    */
   function get_bank_by_id($id)
   {
      return app(BankInterface::class)->getFirstBy([
         "id" => $id
      ]);
   }
}

if (!function_exists('get_bank_loan_by_id')) {
   /**
    * @return \Illuminate\Support\Collection
    * @throws Exception
    */
   function get_bank_loan_by_id($id)
   {
      return app(BankloansInterface::class)->getFirstBy([
         "id" => $id
      ]);
   }
}