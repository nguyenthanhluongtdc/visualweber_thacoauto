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
                'url'         => route('distribution-system.index'),
                'permissions' => ['distribution-system.index'],
            ]);
        });

        $modules = [DistributionSystem::class];
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
            }
        });
    }
}
