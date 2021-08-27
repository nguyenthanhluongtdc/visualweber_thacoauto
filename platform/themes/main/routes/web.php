<?php
Route::domain('danang.thacoauto.dev.gistensal.com')->group(function () {
    Route::group([
        'namespace' => 'Theme\Thaco\Http\Controllers',
        'as' => 'public.landing-page.',
        'middleware' => ['web', InitializeTenancyByDomain::class]
    ], static function () {
        #region sub domain
        // Route::get('/', 'RippleController@getIndex')->name('public.index');
        #endregion
    });
});

Route::domain('binhduong.thacoauto.dev.gistensal.com')->group(function () {
    Route::group([
        'namespace' => 'Theme\RippThacole\Http\Controllers',
        'as' => 'public.landing-page.',
        'middleware' => ['web', InitializeTenancyByDomain::class]
    ], static function () {
        #region sub domain
        // Route::get('/', 'RippleController@getIndex')->name('public.index');
        #endregion
    });
});

// Custom routes
Route::group(['namespace' => 'Theme\Thaco\Http\Controllers', 'middleware' => ['web', 'core']], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {

        //demo web. sẽ xóa khi đổ dữ liệu
        // Route::get('/dich-vu-detail-1', function () {
        //     Theme::asset()->usePath()->add('reset_css', 'css/reset.css');
        //     return Theme::scope('pages/services/service-detail')->render();
        // });
        Route::get('/product-detail-1', function () {
            Theme::asset()->usePath()->add('reset_css', 'css/reset.css');
            return Theme::scope('pages/business/product/product-detail-1')->render();
        });
        Route::get('/product-detail', function () {
            Theme::asset()->usePath()->add('reset_css', 'css/reset.css');
            return Theme::scope('pages/business/product/product-detail')->render();
        });

        // Route::get('/brand-detail', function () {
        //     Theme::asset()->usePath()->add('reset_css', 'css/reset.css');
        //     return Theme::scope('pages/business/brand-detail/index')->render();
        // });

        Route::get('/car-selection', function () {
            Theme::asset()->usePath()->add('reset_css', 'css/reset.css');
            return Theme::scope('pages/business/car-selection/index')->render();
        });

        Route::get('/he-thong-phan-phoi-chi-tiet', function () {
            Theme::asset()->usePath()->add('reset_css', 'css/reset.css');
            return Theme::scope('pages/distribution-system/detail')->render();
        });

        //end demo

        /* ===================== */
        Route::group(['prefix' => 'ajax'], function () {
            Route::get('get-new-posts', 'ThacoController@getNewPosts');
            Route::get('/get-distribution-systems', 'ThacoController@getDistributionSystem')->name('public.ajax.distribution-system');
        });
        /* ===================== */

        Route::get('ajax/search', 'ThacoController@getSearch')->name('public.ajax.search');

        Route::get('/search', 'ThacoController@getResultSearch')->name('public.search');
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
