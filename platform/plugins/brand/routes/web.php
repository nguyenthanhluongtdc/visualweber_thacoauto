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

Route::group(['namespace' => 'Platform\Car\Http\Controllers', 'middleware' => ['web']], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, ['as'=>'public.']), function () {
        Route::get(\SlugHelper::getPrefix(Service::class, 'brands') . '/{slug}', [
            'uses' => 'PublicController@getBrandBySlug'
        ])->name('brand.index');
    });
});