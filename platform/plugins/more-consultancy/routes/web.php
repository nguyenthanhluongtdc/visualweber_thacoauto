<?php

Route::group(['namespace' => 'Platform\MoreConsultancy\Http\Controllers', 'middleware' => ['web', 'core']], function () {

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'more-consultancies', 'as' => 'more-consultancy.'], function () {
            Route::resource('', 'MoreConsultancyController')->parameters(['' => 'more-consultancy']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'MoreConsultancyController@deletes',
                'permission' => 'more-consultancy.destroy',
            ]);
        });
    });

});
