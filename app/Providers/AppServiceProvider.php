<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        DB::listen(function ($query) {
            Log::channel('queries')->info(
                $query->sql,
                $query->bindings,
                $query->time
            );
        });

        Schema::defaultStringLength(191);
    }
}
