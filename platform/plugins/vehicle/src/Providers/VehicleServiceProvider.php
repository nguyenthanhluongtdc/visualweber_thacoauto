<?php

namespace Platform\Vehicle\Providers;

use Platform\Vehicle\Models\Vehicle;
use Illuminate\Support\ServiceProvider;
use Platform\Vehicle\Repositories\Caches\VehicleCacheDecorator;
use Platform\Vehicle\Repositories\Eloquent\VehicleRepository;
use Platform\Vehicle\Repositories\Interfaces\VehicleInterface;
use Platform\Base\Supports\Helper;
use Illuminate\Support\Facades\Event;
use Platform\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class VehicleServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(VehicleInterface::class, function () {
            return new VehicleCacheDecorator(new VehicleRepository(new Vehicle));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/vehicle')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishTranslations()
            ->loadAndPublishViews()
            ->loadRoutes(['web']);

        Event::listen(RouteMatched::class, function () {
            if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
               \Language::registerModule([Vehicle::class]);
            }

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-vehicle',
                'priority'    => 7,
                'parent_id'   => 'cms-plugins-cars-menu',
                'name'        => 'plugins/vehicle::vehicle.name',
                'icon'        => 'fa fa-list',
                'url'         => route('vehicle.index'),
                'permissions' => ['vehicle.index'],
            ]);
        });
        \SlugHelper::registerModule(Vehicle::class);
        \SlugHelper::setPrefix(Vehicle::class, 'vehicles');
    }
}
