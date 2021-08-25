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
        });
    }
}
