<?php

namespace Platform\MoreConsultancy\Providers;

use Platform\MoreConsultancy\Models\MoreConsultancy;
use Illuminate\Support\ServiceProvider;
use Platform\MoreConsultancy\Repositories\Caches\MoreConsultancyCacheDecorator;
use Platform\MoreConsultancy\Repositories\Eloquent\MoreConsultancyRepository;
use Platform\MoreConsultancy\Repositories\Interfaces\MoreConsultancyInterface;
use Platform\Base\Supports\Helper;
use Illuminate\Support\Facades\Event;
use Platform\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class MoreConsultancyServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(MoreConsultancyInterface::class, function () {
            return new MoreConsultancyCacheDecorator(new MoreConsultancyRepository(new MoreConsultancy));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/more-consultancy')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishTranslations()
            ->loadAndPublishViews()
            ->loadRoutes(['web']);

        Event::listen(RouteMatched::class, function () {
            // if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
            //    \Language::registerModule([MoreConsultancy::class]);
            // }

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-more-consultancy',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => 'plugins/more-consultancy::more-consultancy.name',
                'icon'        => 'fa fa-list',
                'url'         => route('more-consultancy.index'),
                'permissions' => ['more-consultancy.index'],
            ]);
        });
    }
}
