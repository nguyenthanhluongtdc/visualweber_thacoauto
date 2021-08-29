<?php

Route::group(['namespace' => 'Platform\Deposit\Http\Controllers', 'middleware' => ['web', 'core']], function () {

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'deposits', 'as' => 'deposit.'], function () {
            Route::resource('', 'DepositController')->parameters(['' => 'deposit']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'DepositController@deletes',
                'permission' => 'deposit.destroy',
            ]);
        });
    });

});
