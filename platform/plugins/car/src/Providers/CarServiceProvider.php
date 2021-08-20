<?php

namespace Platform\Car\Providers;

use Illuminate\Support\ServiceProvider;
use Platform\Base\Supports\Helper;
use Illuminate\Support\Facades\Event;
use Platform\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;
use Platform\Car\Models\Brand;

class CarServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(\Platform\Car\Repositories\Interfaces\CarLineInterface::class, function () {
            return new \Platform\Car\Repositories\Caches\CarLineCacheDecorator(
                new \Platform\Car\Repositories\Eloquent\CarLineRepository(new \Platform\Car\Models\CarLine)
            );
        });

        $this->app->bind(\Platform\Car\Repositories\Interfaces\CarCategoryInterface::class, function () {
            return new \Platform\Car\Repositories\Caches\CarCategoryCacheDecorator(
                new \Platform\Car\Repositories\Eloquent\CarCategoryRepository(new \Platform\Car\Models\CarCategory)
            );
        });

        $this->app->bind(\Platform\Car\Repositories\Interfaces\BrandInterface::class, function () {
            return new \Platform\Car\Repositories\Caches\BrandCacheDecorator(
                new \Platform\Car\Repositories\Eloquent\BrandRepository(new \Platform\Car\Models\Brand)
            );
        });

        $this->app->bind(\Platform\Car\Repositories\Interfaces\CarInterface::class, function () {
            return new \Platform\Car\Repositories\Caches\CarCacheDecorator(
                new \Platform\Car\Repositories\Eloquent\CarRepository(new \Platform\Car\Models\Car)
            );
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        \SlugHelper::registerModule(Brand::class, 'Brands');
        \SlugHelper::setPrefix(Brand::class, 'thuong-hieu');

        $this->setNamespace('plugins/car')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishTranslations()
            ->loadAndPublishViews()
            ->loadRoutes(['web']);

        Event::listen(RouteMatched::class, function () {
            $modules = [
                \Platform\Car\Models\CarCategory::class,
                \Platform\Car\Models\Brand::class,
                \Platform\Car\Models\CarLine::class,
                \Platform\Car\Models\Car::class
            ];

            if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
                \Language::registerModule($modules);
            }

            $this->app->booted(function () use ($modules) {
                \SeoHelper::registerModule($modules);
            });

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-car',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => 'plugins/car::car.name',
                'icon'        => 'fa fa-car',
                // 'url'         => route('car.index'),
                'permissions' => ['car.index'],
            ]);

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-car-category',
                'priority'    => 0,
                'parent_id'   => 'cms-plugins-car',
                'name'        => 'plugins/car::car-category.name',
                'icon'        => null,
                'url'         => route('car-category.index'),
                'permissions' => ['car-category.index'],
            ]);

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-brand',
                'priority'    => 0,
                'parent_id'   => 'cms-plugins-car',
                'name'        => 'plugins/car::brand.name',
                'icon'        => null,
                'url'         => route('brand.index'),
                'permissions' => ['brand.index'],
            ]);

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-car-line',
                'priority'    => 0,
                'parent_id'   => 'cms-plugins-car',
                'name'        => 'plugins/car::car-line.name',
                'icon'        => null,
                'url'         => route('car-line.index'),
                'permissions' => ['car-line.index'],
            ]);

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-cars',
                'priority'    => 0,
                'parent_id'   => 'cms-plugins-car',
                'name'        => 'plugins/car::car.name',
                'icon'        => null,
                'url'         => route('car.index'),
                'permissions' => ['car.index'],
            ]);
        });
    }
}
