<?php

Route::group(['namespace' => 'Platform\TestDrive\Http\Controllers', 'middleware' => ['web', 'core']], function () {

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'test-drives', 'as' => 'test-drive.'], function () {
            Route::resource('', 'TestDriveController')->parameters(['' => 'test-drive']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'TestDriveController@deletes',
                'permission' => 'test-drive.destroy',
            ]);
        });
    });
});

Route::group(['namespace' => 'Platform\TestDrive\Http\Controllers', 'middleware' => ['web']], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, ['as' => 'public.']), function () {
        Route::get('get-district-by-state', [
            'uses' => 'PublicController@getDistrictByState'
        ])->name('test-drive.get-district');

        Route::get('get-showroom-by-state', [
            'uses' => 'PublicController@getShowroomByState'
        ])->name('test-drive.get-showroom');

        Route::get('get-car-by-car', [
            'uses' => 'PublicController@getCarByShowroom'
        ])->name('test-drive.get-car');

        Route::post('get-car-by-car', [
            'uses' => 'PublicController@postTestDrive'
        ])->name('test-drive.post-test-driver');
    });
});
