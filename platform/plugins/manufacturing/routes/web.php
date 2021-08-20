<?php

Route::group(['namespace' => 'Platform\Manufacturing\Http\Controllers', 'middleware' => ['web', 'core']], function () {

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'manufacturings', 'as' => 'manufacturing.'], function () {
            Route::resource('', 'ManufacturingController')->parameters(['' => 'manufacturing']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'ManufacturingController@deletes',
                'permission' => 'manufacturing.destroy',
            ]);
        });
    });

});
