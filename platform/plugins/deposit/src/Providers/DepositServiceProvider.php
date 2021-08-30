<?php

namespace Platform\Deposit\Providers;

use Platform\Deposit\Models\Deposit;
use Illuminate\Support\ServiceProvider;
use Platform\Deposit\Repositories\Caches\DepositCacheDecorator;
use Platform\Deposit\Repositories\Eloquent\DepositRepository;
use Platform\Deposit\Repositories\Interfaces\DepositInterface;
use Platform\Base\Supports\Helper;
use Illuminate\Support\Facades\Event;
use Platform\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class DepositServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(DepositInterface::class, function () {
            return new DepositCacheDecorator(new DepositRepository(new Deposit));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/deposit')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishTranslations()
            ->loadAndPublishViews()
            ->loadRoutes(['web']);

        Event::listen(RouteMatched::class, function () {
            // if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
            //    \Language::registerModule([Deposit::class]);
            // }

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-deposit',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => 'plugins/deposit::deposit.name',
                'icon'        => 'fa fa-list',
                'url'         => route('deposit.index'),
                'permissions' => ['deposit.index'],
            ]);
        });
    }
}
