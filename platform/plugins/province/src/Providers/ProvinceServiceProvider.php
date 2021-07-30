<?php

namespace Platform\Province\Providers;

use Platform\Province\Models\Province;
use Illuminate\Support\ServiceProvider;
use Platform\Province\Repositories\Caches\ProvinceCacheDecorator;
use Platform\Province\Repositories\Eloquent\ProvinceRepository;
use Platform\Province\Repositories\Interfaces\ProvinceInterface;
use Platform\Base\Supports\Helper;
use Illuminate\Support\Facades\Event;
use Platform\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class ProvinceServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(ProvinceInterface::class, function () {
            return new ProvinceCacheDecorator(new ProvinceRepository(new Province));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/province')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishTranslations()
            ->loadAndPublishViews()
            ->loadRoutes(['web']);

        Event::listen(RouteMatched::class, function () {
            if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
                \Language::registerModule([Province::class]);
            }

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-province',
                'priority'    => 5,
                'parent_id'   => 'cms-plugins-blog',
                'name'        => 'plugins/province::province.name',
                'icon'        => null,
                'url'         => route('province.index'),
                'permissions' => ['province.index'],
            ]);
        });
    }
}
