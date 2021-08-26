<?php

Route::group(['namespace' => 'Platform\Vehicle\Http\Controllers', 'middleware' => ['web', 'core']], function () {

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'vehicles', 'as' => 'vehicle.'], function () {
            Route::resource('', 'VehicleController')->parameters(['' => 'vehicle']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'VehicleController@deletes',
                'permission' => 'vehicle.destroy',
            ]);
        });
    });

});
