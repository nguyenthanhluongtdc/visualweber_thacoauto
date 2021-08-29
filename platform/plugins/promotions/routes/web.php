<?php

Route::group(['namespace' => 'Platform\Promotions\Http\Controllers', 'middleware' => ['web', 'core']], function () {

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'promotions', 'as' => 'promotions.'], function () {
            Route::resource('', 'PromotionsController')->parameters(['' => 'promotions']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'PromotionsController@deletes',
                'permission' => 'promotions.destroy',
            ]);
        });
    });

});
