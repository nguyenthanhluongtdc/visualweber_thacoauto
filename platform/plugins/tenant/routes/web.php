<?php

Route::group(['namespace' => 'Platform\Tenant\Http\Controllers', 'middleware' => ['web', 'core']], function () {

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'tenants', 'as' => 'tenant.'], function () {
            Route::resource('', 'TenantController')->parameters(['' => 'tenant']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'TenantController@deletes',
                'permission' => 'tenant.destroy',
            ]);
        });
    });

});
