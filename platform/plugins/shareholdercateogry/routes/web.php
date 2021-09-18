<?php

use Platform\Shareholdercateogry\Models\Shareholdercateogry;

Route::group(['namespace' => 'Platform\Shareholdercateogry\Http\Controllers', 'middleware' => ['web', 'core']], function () {

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'shareholdercateogries', 'as' => 'shareholdercateogry.'], function () {
            Route::resource('', 'ShareholdercateogryController')->parameters(['' => 'shareholdercateogry']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'ShareholdercateogryController@deletes',
                'permission' => 'shareholdercateogry.destroy',
            ]);
        });
    });
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, ['as' => 'public.']), function () {
        Route::get(\SlugHelper::getPrefix(Shareholdercateogry::class, 'shareholder-category') . '/{slug}', [
            'uses' => 'ShareholdercateogryController@getShareholdercateogryBySlug'
        ])->name('shareholdercateogry.index');
    });

});

