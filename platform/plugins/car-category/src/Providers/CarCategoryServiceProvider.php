<?php

namespace Platform\CarCategory\Providers;

use Platform\CarCategory\Models\CarCategory;
use Illuminate\Support\ServiceProvider;
use Platform\CarCategory\Repositories\Caches\CarCategoryCacheDecorator;
use Platform\CarCategory\Repositories\Eloquent\CarCategoryRepository;
use Platform\CarCategory\Repositories\Interfaces\CarCategoryInterface;
use Platform\Base\Supports\Helper;
use Illuminate\Support\Facades\Event;
use Platform\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class CarCategoryServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(CarCategoryInterface::class, function () {
            return new CarCategoryCacheDecorator(new CarCategoryRepository(new CarCategory));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/car-category')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishTranslations()
            ->loadAndPublishViews()
            ->loadRoutes(['web']);

        Event::listen(RouteMatched::class, function () {
            if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
               \Language::registerModule([CarCategory::class]);
            }

            dashboard_menu()
            ->registerItem([
                'id'          => 'cms-plugins-cars-menu',
                'priority'    => 3,
                'parent_id'   => null,
                'name'        => 'Car Category',
                'icon'        => 'fas fa-truck-moving',
                'url'         => route('car-category.index'),
                'permissions' => ['car-category.index'],
            ])
            ->registerItem([
                'id'          => 'cms-plugins-car-category',
                'priority'    => 5,
                'parent_id'   => 'cms-plugins-cars-menu',
                'name'        => 'plugins/car-category::car-category.name',
                'icon'        => 'fa fa-list',
                'url'         => route('car-category.index'),
                'permissions' => ['car-category.index'],
            ]);
        });
        \SlugHelper::registerModule(CarCategory::class);
        \SlugHelper::setPrefix(CarCategory::class, 'car-categories');
    }
}
