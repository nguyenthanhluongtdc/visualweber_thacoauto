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
use Platform\DistributionSystem\Models\Showroom;
use Platform\DistributionSystem\Models\ShowroomBrand;
use Platform\DistributionSystem\Repositories\Interfaces\ShowroomInterface;

class DistributionSystemServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(DistributionSystemInterface::class, function () {
            return new DistributionSystemCacheDecorator(new DistributionSystemRepository(new DistributionSystem));
        });

        $this->app->bind(\Platform\DistributionSystem\Repositories\Interfaces\ShowroomInterface::class, function () {
            return new \Platform\DistributionSystem\Repositories\Caches\ShowroomCacheDecorator(
                new \Platform\DistributionSystem\Repositories\Eloquent\ShowroomRepository(new \Platform\DistributionSystem\Models\Showroom)
            );
        });

        $this->app->bind(\Platform\DistributionSystem\Repositories\Interfaces\ShowroomBrandInterface::class, function () {
            return new \Platform\DistributionSystem\Repositories\Caches\ShowroomBrandCacheDecorator(
                new \Platform\DistributionSystem\Repositories\Eloquent\ShowroomBrandRepository(new \Platform\DistributionSystem\Models\ShowroomBrand)
            );
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        \SlugHelper::registerModule(DistributionSystem::class, 'DistributionSystem');
        \SlugHelper::setPrefix(DistributionSystem::class, 'he-thong-phan-phoi');

        $this->setNamespace('plugins/distribution-system')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishTranslations()
            ->loadAndPublishViews()
            ->loadRoutes(['web']);

        Event::listen(RouteMatched::class, function () {
            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-distribution-system',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => 'plugins/distribution-system::distribution-system.name',
                'icon'        => 'fa fa-list',
                'url'         => null,
                'permissions' => ['distribution-system.index'],
            ]);

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-distribution-system-child',
                'priority'    => 0,
                'parent_id'   => 'cms-plugins-distribution-system',
                'name'        => 'plugins/distribution-system::distribution-system.name',
                'icon'        => null,
                'url'         => route('distribution-system.index'),
                'permissions' => ['showroom.index'],
            ]);

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-showroom',
                'priority'    => 0,
                'parent_id'   => 'cms-plugins-distribution-system',
                'name'        => 'plugins/distribution-system::showroom.name',
                'icon'        => null,
                'url'         => route('showroom.index'),
                'permissions' => ['showroom.index'],
            ]);

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-showroom-brand',
                'priority'    => 0,
                'parent_id'   => 'cms-plugins-distribution-system',
                'name'        => 'plugins/distribution-system::showroom-brand.name',
                'icon'        => null,
                'url'         => route('showroom-brand.index'),
                'permissions' => ['showroom-brand.index'],
            ]);
        });

        $modules = [DistributionSystem::class, Showroom::class, ShowroomBrand::class];
        if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
            \Language::registerModule($modules);
        }
        $this->app->booted(function () use ($modules) {
            \SeoHelper::registerModule($modules);
        });

        $this->app->booted(function () {

            if (defined('CUSTOM_FIELD_MODULE_SCREEN_NAME')) {
                \CustomField::registerModule(DistributionSystem::class)
                    ->registerRule('basic', trans('plugins/distribution-system::distribution-system.name'), DistributionSystem::class, function () {
                        return $this->app->make(DistributionSystemInterface::class)->pluck('app_distribution_systems.name', 'app_distribution_systems.id');
                    })
                    ->expandRule('other', trans('plugins/custom-field::rules.model_name'), 'model_name', function () {
                        return [
                        DistributionSystem::class => trans('plugins/distribution-system::distribution-system.name'),
                        ];
                    });

                \CustomField::registerModule(Showroom::class)
                    ->registerRule('basic', trans('plugins/distribution-system::showroom.name'), Showroom::class, function () {
                        return $this->app->make(ShowroomInterface::class)->pluck('app_showrooms.name', 'app_showrooms.id');
                    })
                    ->expandRule('other', trans('plugins/custom-field::rules.model_name'), 'model_name', function () {
                        return [
                            Showroom::class => trans('plugins/distribution-system::showroom.name'),
                        ];
                    });
            }
        });
        \SlugHelper::registerModule(Showroom::class);
        \SlugHelper::setPrefix(Showroom::class, 'showrooms');
    }
}
