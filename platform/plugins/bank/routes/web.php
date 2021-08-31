<?php

Route::group(['namespace' => 'Platform\Bank\Http\Controllers', 'middleware' => 'web'], function () {

    Route::group(['prefix' => config('core.base.general.admin_dir'), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'banks', 'as' => 'bank.'], function () {
            Route::resource('', 'BankController')->parameters(['' => 'bank']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'BankController@deletes',
                'permission' => 'bank.destroy',
            ]);
        });
    });

});
