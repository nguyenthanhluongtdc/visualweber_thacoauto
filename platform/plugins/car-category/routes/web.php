<?php

use Platform\CarCategory\Models\CarCategory;

Route::group(['namespace' => 'Platform\CarCategory\Http\Controllers', 'middleware' => ['web', 'core']], function () {

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'car-categories', 'as' => 'car-category.'], function () {
            Route::resource('', 'CarCategoryController')->parameters(['' => 'car-category']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'CarCategoryController@deletes',
                'permission' => 'car-category.destroy',
            ]);
        });
    });
});



Route::group(['namespace' => 'Platform\CarCategory\Http\Controllers', 'middleware' => ['web', 'core']], function () {

    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {

        if (SlugHelper::getPrefix(CarCategory::class)) {
            Route::get(SlugHelper::getPrefix(CarCategory::class) . '/{slug}', [
                'uses' => 'PublicController@getCategory',
            ]);
        }
    });
});
