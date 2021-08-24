<?php

Route::group(['namespace' => 'Platform\Car\Http\Controllers', 'middleware' => ['web', 'core']], function () {

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'cars', 'as' => 'car.'], function () {
            Route::resource('', 'CarController')->parameters(['' => 'car']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'CarController@deletes',
                'permission' => 'car.destroy',
            ]);
        });
    });

    // Add below this line: Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {
    Route::group(['prefix' => 'colors', 'as' => 'color.'], function () {
        Route::resource('', 'ColorController')->parameters(['' => 'color']);
        Route::delete('items/destroy', [
            'as'         => 'deletes',
            'uses'       => 'ColorController@deletes',
            'permission' => 'color.destroy',
        ]);
    });

    Route::group(['prefix' => 'accessories', 'as' => 'accessory.'], function () {
        Route::resource('', 'AccessoryController')->parameters(['' => 'accessory']);
        Route::delete('items/destroy', [
            'as'         => 'deletes',
            'uses'       => 'AccessoryController@deletes',
            'permission' => 'accessory.destroy',
        ]);
    });
    Route::group(['prefix' => 'equipment', 'as' => 'equipment.'], function () {
        Route::resource('', 'EquipmentController')->parameters(['' => 'equipment']);
        Route::delete('items/destroy', [
            'as'         => 'deletes',
            'uses'       => 'EquipmentController@deletes',
            'permission' => 'equipment.destroy',
        ]);
    });
});
