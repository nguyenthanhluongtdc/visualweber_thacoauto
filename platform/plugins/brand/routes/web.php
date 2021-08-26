<?php

Route::group(['namespace' => 'Platform\Brand\Http\Controllers', 'middleware' => ['web', 'core']], function () {

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'brands', 'as' => 'brand.'], function () {
            Route::resource('', 'BrandController')->parameters(['' => 'brand']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'BrandController@deletes',
                'permission' => 'brand.destroy',
            ]);
        });
    });

});
