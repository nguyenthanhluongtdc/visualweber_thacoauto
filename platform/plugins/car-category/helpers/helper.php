<?php
if(!function_exists('get_car_categories_parent')){
   function get_car_categories_parent(){
      $carCategoryInterface = resolve('Platform\CarCategory\Repositories\Interfaces\CarCategoryInterface');
      $model = new \Platform\CarCategory\Models\CarCategory;
      $model = $model->whereNull('parent_id')->orWhere('parent_id',0);
      return $carCategoryInterface->applyBeforeExecuteQuery($model)->get();
   }
}