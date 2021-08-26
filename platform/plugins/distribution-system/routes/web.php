<?php

Route::group(['namespace' => 'Platform\DistributionSystem\Http\Controllers', 'middleware' => ['web', 'core']], function () {

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'distribution-systems', 'as' => 'distribution-system.'], function () {
            Route::resource('', 'DistributionSystemController')->parameters(['' => 'distribution-system']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'DistributionSystemController@deletes',
                'permission' => 'distribution-system.destroy',
            ]);
        });

        Route::group(['prefix' => 'showrooms', 'as' => 'showroom.'], function () {
            Route::resource('', 'ShowroomController')->parameters(['' => 'showroom']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'ShowroomController@deletes',
                'permission' => 'showroom.destroy',
            ]);
        });
    });

});
