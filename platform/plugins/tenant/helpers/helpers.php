<?php 
if(!function_exists('get_tenants')){
   function get_tenants(){
      $tenantInterface = resolve('Platform\Tenant\Repositories\Interfaces\TenantInterface');
      return $tenantInterface->all();
   }
}