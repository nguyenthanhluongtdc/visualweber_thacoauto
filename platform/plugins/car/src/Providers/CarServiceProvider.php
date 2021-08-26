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
        $this->app->bind(CarInterface::class, function () {
            return new CarCacheDecorator(new CarRepository(new Car));
        });

        $this->app->bind(\Platform\Car\Repositories\Interfaces\ColorInterface::class, function () {
            return new \Platform\Car\Repositories\Caches\ColorCacheDecorator(
                new \Platform\Car\Repositories\Eloquent\ColorRepository(new \Platform\Car\Models\Color)
            );
        });

        $this->app->bind(\Platform\Car\Repositories\Interfaces\AccessoryInterface::class, function () {
            return new \Platform\Car\Repositories\Caches\AccessoryCacheDecorator(
                new \Platform\Car\Repositories\Eloquent\AccessoryRepository(new \Platform\Car\Models\Accessory)
            );
        });

        $this->app->bind(\Platform\Car\Repositories\Interfaces\EquipmentInterface::class, function () {
            return new \Platform\Car\Repositories\Caches\EquipmentCacheDecorator(
                new \Platform\Car\Repositories\Eloquent\EquipmentRepository(new \Platform\Car\Models\Equipment)
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
            // if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
            //    \Language::registerModule([Car::class]);
                    // \Language::registerModule([\Platform\Car\Models\Color::class]);
                    // \Language::registerModule([\Platform\Car\Models\Accessory::class]);
                    // \Language::registerModule([\Platform\Car\Models\Equipment::class]);
            // }


            dashboard_menu()
            ->registerItem([
                'id'          => 'cms-plugins-car-menu',
                'priority'    => 4,
                'parent_id'   => null,
                'name'        => 'Cars',
                'icon'        => 'fa fa-car',
                'url'         => route('car.index'),
                'permissions' => ['car.index'],
            ])
            ->registerItem([
                'id'          => 'cms-plugins-car',
                'priority'    => 5,
                'parent_id'   => 'cms-plugins-car-menu',
                'name'        => 'plugins/car::car.name',
                'icon'        => 'fa fa-list',
                'url'         => route('car.index'),
                'permissions' => ['car.index'],
            ]);

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-color',
                'priority'    => 6,
                'parent_id'   => 'cms-plugins-car-menu',
                'name'        => 'plugins/car::color.name',
                'icon'        => 'fa fa-list',
                'url'         => route('color.index'),
                'permissions' => ['color.index'],
            ]);

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-accessory',
                'priority'    => 7,
                'parent_id'   => 'cms-plugins-car-menu',
                'name'        => 'plugins/car::accessory.name',
                'icon'        => 'fa fa-list',
                'url'         => route('accessory.index'),
                'permissions' => ['accessory.index'],
            ]);

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-equipment',
                'priority'    => 8,
                'parent_id'   => 'cms-plugins-car-menu',
                'name'        => 'plugins/car::equipment.name',
                'icon'        => 'fa fa-list',
                'url'         => route('equipment.index'),
                'permissions' => ['equipment.index'],
            ]);

            \Gallery::registerModule([\Platform\Car\Models\Color::class]);
        });
    }
}
