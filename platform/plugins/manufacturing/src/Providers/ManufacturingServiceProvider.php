<?php

namespace Platform\Manufacturing\Providers;

use Platform\Manufacturing\Models\Manufacturing;
use Illuminate\Support\ServiceProvider;
use Platform\Manufacturing\Repositories\Caches\ManufacturingCacheDecorator;
use Platform\Manufacturing\Repositories\Eloquent\ManufacturingRepository;
use Platform\Manufacturing\Repositories\Interfaces\ManufacturingInterface;
use Platform\Base\Supports\Helper;
use Illuminate\Support\Facades\Event;
use Platform\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class ManufacturingServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(ManufacturingInterface::class, function () {
            return new ManufacturingCacheDecorator(new ManufacturingRepository(new Manufacturing));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/manufacturing')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishTranslations()
            ->loadAndPublishViews()
            ->loadRoutes(['web']);

        Event::listen(RouteMatched::class, function () {
            if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
               \Language::registerModule([Manufacturing::class]);
            }

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-manufacturing',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => 'plugins/manufacturing::manufacturing.name',
                'icon'        => 'fa fa-list',
                'url'         => route('manufacturing.index'),
                'permissions' => ['manufacturing.index'],
            ]);
        });

        $this->app->register(HookServiceProvider::class);
        \SlugHelper::registerModule(Manufacturing::class, 'Manufacturing');
    }
}
