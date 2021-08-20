<?php

use Platform\Service\Models\Service;

Route::group(['namespace' => 'Platform\Service\Http\Controllers', 'middleware' => ['web', 'core']], function () {

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'services', 'as' => 'service.'], function () {
            Route::resource('', 'ServiceController')->parameters(['' => 'service']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'ServiceController@deletes',
                'permission' => 'service.destroy',
            ]);
        });
    });

    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {

        Route::get(\SlugHelper::getPrefix(Service::class, 'dich-vu') . '/{slug}', [
            'uses' => 'PublicController@getBySlug',
        ]);
    });
});
