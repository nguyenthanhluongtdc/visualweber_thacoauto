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
        Route::group(['prefix' => 'car-lines', 'as' => 'car-line.'], function () {
            Route::resource('', 'CarLineController')->parameters(['' => 'car-line']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'CarLineController@deletes',
                'permission' => 'car-line.destroy',
            ]);
        });

        Route::group(['prefix' => 'cars', 'as' => 'car.'], function () {
            Route::resource('', 'CarController')->parameters(['' => 'car']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'CarController@deletes',
                'permission' => 'car.destroy',
            ]);
        });
    });
});
Route::group(['namespace' => 'Platform\Car\Http\Controllers', 'middleware' => ['web']], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {
        Route::get(\SlugHelper::getPrefix(Service::class, 'thuong-hieu') . '/{slug}', [
            'uses' => 'PublicController@getBrandBySlug',
        ]);
        // Route::get('/{slug}', [
        //     'uses' => 'PublicController@getCarCategoryBySlug',
        // ]);
    });
});
