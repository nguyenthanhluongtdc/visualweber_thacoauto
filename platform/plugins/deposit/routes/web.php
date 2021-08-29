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
Route::group(['namespace' => 'Platform\Deposit\Http\Controllers', 'middleware' => ['web']], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, ['as' => 'public.']), function () {
        Route::post('deposits', [
            'uses' => 'PublicController@store'
        ])->name('deppsit.post');
    });
});