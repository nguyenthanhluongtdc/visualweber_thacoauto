<?php

// Custom routes
Route::group(['namespace' => 'Theme\Thaco\Http\Controllers', 'middleware' => ['web', 'core']], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {

        Route::get('/dich-vu-detail-1', function () {
            return Theme::scope('pages/services/service-detail')->render();
        });

        Route::get('ajax/search', 'ThacoController@getSearch')->name('public.ajax.search');

    });
});

Theme::routes();

Route::group(['namespace' => 'Theme\Thaco\Http\Controllers', 'middleware' => ['web', 'core']], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {

        Route::get('/', 'ThacoController@getIndex')->name('public.index');

        Route::get('sitemap.xml', [
            'as'   => 'public.sitemap',
            'uses' => 'ThacoController@getSiteMap',
        ]);

        Route::get('{slug?}' . config('core.base.general.public_single_ending_url'), [
            'as'   => 'public.single',
            'uses' => 'ThacoController@getView',
        ]);

    });
});

