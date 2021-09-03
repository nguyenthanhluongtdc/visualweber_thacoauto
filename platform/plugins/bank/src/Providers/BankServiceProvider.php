<?php

namespace Platform\Bank\Providers;

use Platform\Bank\Models\Bank;
use Illuminate\Support\ServiceProvider;
use Platform\Bank\Repositories\Caches\BankCacheDecorator;
use Platform\Bank\Repositories\Eloquent\BankRepository;
use Platform\Bank\Repositories\Interfaces\BankInterface;
use Platform\Base\Supports\Helper;
use Event;
use Platform\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class BankServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(BankInterface::class, function () {
            return new BankCacheDecorator(new BankRepository(new Bank));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/bank')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishTranslations()
            ->loadRoutes(['web']);

        Event::listen(RouteMatched::class, function () {
            if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
                \Language::registerModule([Bank::class]);
            }

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-bank',
                'priority'    => 1,
                'parent_id'   => 'cms-plugins-bankloans-current',
                'name'        => 'Ngân hàng',
                'icon'        => '',
                'url'         => route('bank.index'),
                'permissions' => ['bank.index'],
            ]);
        });
    }
}
