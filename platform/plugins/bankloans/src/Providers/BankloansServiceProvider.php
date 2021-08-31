<?php

namespace Platform\Bankloans\Providers;

use Platform\Bankloans\Models\Bankloans;
use Illuminate\Support\ServiceProvider;
use Platform\Bankloans\Repositories\Caches\BankloansCacheDecorator;
use Platform\Bankloans\Repositories\Eloquent\BankloansRepository;
use Platform\Bankloans\Repositories\Interfaces\BankloansInterface;
use Platform\Base\Supports\Helper;
use Event;
use Platform\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class BankloansServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(BankloansInterface::class, function () {
            return new BankloansCacheDecorator(new BankloansRepository(new Bankloans));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/bankloans')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishTranslations()
            ->loadRoutes(['web']);

        Event::listen(RouteMatched::class, function () {
            if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
                \Language::registerModule([Bankloans::class]);
            }

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-bankloans-current',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => 'Ngân hàng',
                'icon'        => 'fas fa-university',
                'url'         => route('bankloans.index'),
                'permissions' => ['bankloans.index'],
            ])->registerItem([
                'id'          => 'cms-plugins-bankloans',
                'priority'    => 2,
                'parent_id'   => 'cms-plugins-bankloans-current',
                'name'        => 'Khoảng vay',
                'icon'        => '',
                'url'         => route('bankloans.index'),
                'permissions' => ['bankloans.index'],
            ]);
        });
    }
}
