<?php

namespace Platform\Shareholdercateogry\Providers;

use Platform\Shareholdercateogry\Models\Shareholdercateogry;
use Illuminate\Support\ServiceProvider;
use Platform\Shareholdercateogry\Repositories\Caches\ShareholdercateogryCacheDecorator;
use Platform\Shareholdercateogry\Repositories\Eloquent\ShareholdercateogryRepository;
use Platform\Shareholdercateogry\Repositories\Interfaces\ShareholdercateogryInterface;
use Platform\Base\Supports\Helper;
use Illuminate\Support\Facades\Event;
use Platform\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class ShareholdercateogryServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(ShareholdercateogryInterface::class, function () {
            return new ShareholdercateogryCacheDecorator(new ShareholdercateogryRepository(new Shareholdercateogry));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/shareholdercateogry')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishTranslations()
            ->loadAndPublishViews()
            ->loadRoutes(['web']);

        Event::listen(RouteMatched::class, function () {
            // if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
            //    \Language::registerModule([Shareholdercateogry::class]);
            // }

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-shareholdercateogry',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => 'plugins/shareholdercateogry::shareholdercateogry.name',
                'icon'        => 'fa fa-list',
                'url'         => route('shareholdercateogry.index'),
                'permissions' => ['shareholdercateogry.index'],
            ]);
        });
            \SlugHelper::registerModule(Shareholdercateogry::class);
            \SlugHelper::setPrefix(Shareholdercateogry::class, 'shareholder-category');
    }
}
