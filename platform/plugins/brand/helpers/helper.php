<?php
if(!function_exists('get_brands')){
   function get_brands(){
      $brandInterface = resolve('Platform\Brand\Repositories\Interfaces\BrandInterface');
      return $brandInterface->all();
   }
}