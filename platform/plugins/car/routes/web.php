<?php

Route::group(['namespace' => 'Platform\Car\Http\Controllers', 'middleware' => ['web', 'core']], function () {

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => [
        'auth']
    ], function () {

        Route::group(['prefix' => 'cars', 'as' => 'car.',
        'middleware' => [
            'car_tenant',
        ]], function () {
            Route::resource('', 'CarController')->parameters(['' => 'car']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'CarController@deletes',
                'permission' => 'car.destroy',
            ]);
        });
    });

    // Add below this line: Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {
    Route::group(['prefix' => 'colors', 'as' => 'color.',
    'middleware' => [
        'model_relation_of_car',
    ]
    ], function () {
        Route::resource('', 'ColorController')->parameters(['' => 'color']);
        Route::delete('items/destroy', [
            'as'         => 'deletes',
            'uses'       => 'ColorController@deletes',
            'permission' => 'color.destroy',
        ]);
    });

    Route::group(['prefix' => 'accessories', 'as' => 'accessory.',
    'middleware' => [
        'model_relation_of_car',
    ]], function () {
        Route::resource('', 'AccessoryController')->parameters(['' => 'accessory']);
        Route::delete('items/destroy', [
            'as'         => 'deletes',
            'uses'       => 'AccessoryController@deletes',
            'permission' => 'accessory.destroy',
        ]);
    });
    Route::group(['prefix' => 'equipment', 'as' => 'equipment.',
    'middleware' => [
        'model_relation_of_car',
    ]], function () {
        Route::resource('', 'EquipmentController')->parameters(['' => 'equipment']);
        Route::delete('items/destroy', [
            'as'         => 'deletes',
            'uses'       => 'EquipmentController@deletes',
            'permission' => 'equipment.destroy',
        ]);
        // Route::get('/{slug}', [
        //     'uses' => 'PublicController@getCarCategoryBySlug',
        // ]);
    });
});


Route::group(['namespace' => 'Platform\Car\Http\Controllers', 'middleware' => ['web']], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, ['as' => 'public.']), function () {
        Route::get('/{car}/car-selection', [
            'uses' => 'PublicController@getCarSelection'
        ])->name('brand.car-selection');

        Route::get('/{car}/cost-estimate', [
            'uses' => 'PublicController@getCostEstimate'
        ])->name('brand.cost-estimate');

        Route::get('/{car}/deposit', [
            'uses' => 'PublicController@getDeposit'
        ])->name('brand.deposit');


        Route::get('/{car}/test-drive', [
            'uses' => 'PublicController@testDrive'
        ])->name('brand.test-drive');

        Route::group(['prefix' => 'ajax'], function () {
            Route::get('get-car-opions', 'PublicController@getCarOptions')->name('ajax.car-option');
        });
    });
});
