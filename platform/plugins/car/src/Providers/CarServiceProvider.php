<?php

namespace Platform\Car\Providers;

use Platform\Car\Models\Car;
use Platform\Car\Models\Brand;
use Platform\Base\Supports\Helper;
use Platform\Car\Models\CarCategory;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Events\RouteMatched;
use Platform\Car\Providers\HookServiceProvider;
use Platform\Base\Traits\LoadAndPublishDataTrait;
use Platform\Car\Repositories\Interfaces\BrandInterface;
use Platform\Car\Repositories\Interfaces\CarCategoryInterface;

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

        \SlugHelper::registerModule(CarCategory::class, 'CarCategory');

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
        $this->app->register(HookServiceProvider::class);
        $this->app->booted(function () {
            if (defined('CUSTOM_FIELD_MODULE_SCREEN_NAME')) {
                \CustomField::registerModule(Brand::class)
                    ->registerRule('basic', trans('plugins/car::brand.name'), Brand::class, function () {
                        return $this->app->make(BrandInterface::class)->pluck('app_brands.name', 'app_brands.id');
                    })
                    ->expandRule('other', trans('plugins/custom-field::rules.model_name'), 'model_name', function () {
                        return [
                            Brand::class => trans('plugins/car::brand.name'),
                        ];
                    })
                    ->registerModule(CarCategory::class)
                        ->registerRule('basic', trans('plugins/car::car-category.name'), CarCategory::class, function () {
                            return $this->app->make(CarCategoryInterface::class)->pluck('app_car_categories.name', 'app_car_categories.id');
                        })
                        ->expandRule('other', trans('plugins/custom-field::rules.model_name'), 'model_name', function () {
                            return [
                                CarCategory::class => trans('plugins/car::car-category.name'),
                            ];
                    });;
            }
        });
    }
}
