<?php

namespace Platform\DistributionSystem\Providers;

use Platform\DistributionSystem\Models\DistributionSystem;
use Illuminate\Support\ServiceProvider;
use Platform\DistributionSystem\Repositories\Caches\DistributionSystemCacheDecorator;
use Platform\DistributionSystem\Repositories\Eloquent\DistributionSystemRepository;
use Platform\DistributionSystem\Repositories\Interfaces\DistributionSystemInterface;
use Platform\Base\Supports\Helper;
use Illuminate\Support\Facades\Event;
use Platform\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class DistributionSystemServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(DistributionSystemInterface::class, function () {
            return new DistributionSystemCacheDecorator(new DistributionSystemRepository(new DistributionSystem));
        });

        $this->app->bind(\Platform\DistributionSystem\Repositories\Interfaces\CityProvinceInterface::class, function () {
            return new \Platform\DistributionSystem\Repositories\Caches\CityProvinceCacheDecorator(
                new \Platform\DistributionSystem\Repositories\Eloquent\CityProvinceRepository(new \Platform\DistributionSystem\Models\CityProvince)
            );
        });

        $this->app->bind(\Platform\DistributionSystem\Repositories\Interfaces\BranchInterface::class, function () {
            return new \Platform\DistributionSystem\Repositories\Caches\BranchCacheDecorator(
                new \Platform\DistributionSystem\Repositories\Eloquent\BranchRepository(new \Platform\DistributionSystem\Models\Branch)
            );
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/distribution-system')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishTranslations()
            ->loadAndPublishViews()
            ->loadRoutes(['web']);

        Event::listen(RouteMatched::class, function () {
            // if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
            //    \Language::registerModule([DistributionSystem::class]);
            //    \Language::registerModule([\Platform\DistributionSystem\Models\CityProvince::class]);
            //    \Language::registerModule([\Platform\DistributionSystem\Models\Branch::class]);
            // }

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-distribution-system',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => 'plugins/distribution-system::distribution-system.name',
                'icon'        => 'fa fa-list',
                'url'         => route('distribution-system.index'),
                'permissions' => ['distribution-system.index'],
            ]);

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-city-province',
                'priority'    => 0,
                'parent_id'   => 'cms-plugins-distribution-system',
                'name'        => 'plugins/distribution-system::city-province.name',
                'icon'        => null,
                'url'         => route('city-province.index'),
                'permissions' => ['city-province.index'],
            ]);

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-branch',
                'priority'    => 0,
                'parent_id'   => 'cms-plugins-distribution-system',
                'name'        => 'plugins/distribution-system::branch.name',
                'icon'        => null,
                'url'         => route('branch.index'),
                'permissions' => ['branch.index'],
            ]);
        });
    }
}
