<?php

namespace Platform\Brand\Providers;

use Platform\Brand\Models\Brand;
use Illuminate\Support\ServiceProvider;
use Platform\Brand\Repositories\Caches\BrandCacheDecorator;
use Platform\Brand\Repositories\Eloquent\BrandRepository;
use Platform\Brand\Repositories\Interfaces\BrandInterface;
use Platform\Base\Supports\Helper;
use Illuminate\Support\Facades\Event;
use Platform\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class BrandServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(BrandInterface::class, function () {
            return new BrandCacheDecorator(new BrandRepository(new Brand));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/brand')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishTranslations()
            ->loadAndPublishViews()
            ->loadRoutes(['web']);

        Event::listen(RouteMatched::class, function () {
            // if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
            //    \Language::registerModule([Brand::class]);
            // }

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-brand',
                'priority'    => 6,
                'parent_id'   => 'cms-plugins-cars-menu',
                'name'        => 'plugins/brand::brand.name',
                'icon'        => 'fa fa-list',
                'url'         => route('brand.index'),
                'permissions' => ['brand.index'],
            ]);
        });
    }
}
