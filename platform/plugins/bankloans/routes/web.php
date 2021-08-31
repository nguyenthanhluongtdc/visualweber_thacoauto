<?php

Route::group(['namespace' => 'Platform\Bankloans\Http\Controllers', 'middleware' => 'web'], function () {

    Route::group(['prefix' => config('core.base.general.admin_dir'), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'bankloans', 'as' => 'bankloans.'], function () {
            Route::resource('', 'BankloansController')->parameters(['' => 'bankloans']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'BankloansController@deletes',
                'permission' => 'bankloans.destroy',
            ]);
        });
    });

});
