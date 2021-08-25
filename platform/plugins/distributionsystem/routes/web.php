<?php

Route::group(['namespace' => 'Platform\Distributionsystem\Http\Controllers', 'middleware' => ['web', 'core']], function () {

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'distributionsystems', 'as' => 'distributionsystem.'], function () {
            Route::resource('', 'DistributionsystemController')->parameters(['' => 'distributionsystem']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'DistributionsystemController@deletes',
                'permission' => 'distributionsystem.destroy',
            ]);
        });
    });

});
