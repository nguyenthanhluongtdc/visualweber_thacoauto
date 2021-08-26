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

        Route::group(['prefix' => 'city-provinces', 'as' => 'city-province.'], function () {
            Route::resource('', 'CityProvinceController')->parameters(['' => 'city-province']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'CityProvinceController@deletes',
                'permission' => 'city-province.destroy',
            ]);
        });

        Route::group(['prefix' => 'branches', 'as' => 'branch.'], function () {
            Route::resource('', 'BranchController')->parameters(['' => 'branch']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'BranchController@deletes',
                'permission' => 'branch.destroy',
            ]);
        });
    });

});
