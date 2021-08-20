<?php

namespace Platform\Car\Providers;

use Platform\Car\Models\Car;
use Illuminate\Support\ServiceProvider;
use Platform\Car\Repositories\Caches\CarCacheDecorator;
use Platform\Car\Repositories\Eloquent\CarRepository;
use Platform\Car\Repositories\Interfaces\CarInterface;
use Platform\Base\Supports\Helper;
use Illuminate\Support\Facades\Event;
use Platform\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class CarServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        // $this->app->bind(CarInterface::class, function () {
        //     return new CarCacheDecorator(new CarRepository(new Car));
        // });

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

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/car')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishTranslations()
            ->loadAndPublishViews()
            ->loadRoutes(['web']);

        Event::listen(RouteMatched::class, function () {
            if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
                \Language::registerModule([\Platform\Car\Models\CarCategory::class]);
                \Language::registerModule([\Platform\Car\Models\Brand::class]);
            }

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
        });
    }
}
