<?php

Route::group(['namespace' => 'Platform\Shareholder\Http\Controllers', 'middleware' => ['web', 'core']], function () {

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'shareholders', 'as' => 'shareholder.'], function () {
            Route::resource('', 'ShareholderController')->parameters(['' => 'shareholder']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'ShareholderController@deletes',
                'permission' => 'shareholder.destroy',
            ]);
        });
    });

});
