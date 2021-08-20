<?php

Route::group(['namespace' => 'Platform\Car\Http\Controllers', 'middleware' => ['web', 'core']], function () {

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {
        Route::group(['prefix' => 'car-categories', 'as' => 'car-category.'], function () {
            Route::resource('', 'CarCategoryController')->parameters(['' => 'car-category']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'CarCategoryController@deletes',
                'permission' => 'car-category.destroy',
            ]);
        });

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
