<?php

namespace Platform\Distributionsystem\Providers;

use Platform\Distributionsystem\Models\Distributionsystem;
use Illuminate\Support\ServiceProvider;
use Platform\Distributionsystem\Repositories\Caches\DistributionsystemCacheDecorator;
use Platform\Distributionsystem\Repositories\Eloquent\DistributionsystemRepository;
use Platform\Distributionsystem\Repositories\Interfaces\DistributionsystemInterface;
use Platform\Base\Supports\Helper;
use Illuminate\Support\Facades\Event;
use Platform\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class DistributionsystemServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(DistributionsystemInterface::class, function () {
            return new DistributionsystemCacheDecorator(new DistributionsystemRepository(new Distributionsystem));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/distributionsystem')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishTranslations()
            ->loadAndPublishViews()
            ->loadRoutes(['web']);

        Event::listen(RouteMatched::class, function () {
            // if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
            //    \Language::registerModule([Distributionsystem::class]);
            // }

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-distributionsystem',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => 'plugins/distributionsystem::distributionsystem.name',
                'icon'        => 'fa fa-list',
                'url'         => route('distributionsystem.index'),
                'permissions' => ['distributionsystem.index'],
            ]);
        });
    }
}
