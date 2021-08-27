<?php 

if(!function_exists('get_car_lines')){
   function get_car_vehicles(){
      $vehiclesInterface = resolve('Platform\Vehicle\Repositories\Interfaces\VehicleInterface');
      return $vehiclesInterface->all();
   }
}