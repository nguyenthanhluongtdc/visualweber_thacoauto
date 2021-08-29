<?php

Route::group(['namespace' => 'Platform\Province\Http\Controllers', 'middleware' => ['web', 'core']], function () {

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'provinces', 'as' => 'province.'], function () {
            Route::resource('', 'ProvinceController')->parameters(['' => 'province']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'ProvinceController@deletes',
                'permission' => 'province.destroy',
            ]);
        });
    });

});
