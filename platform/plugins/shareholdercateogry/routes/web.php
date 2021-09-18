<?php

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

});
