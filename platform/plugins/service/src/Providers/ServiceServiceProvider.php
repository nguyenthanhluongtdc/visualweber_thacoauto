<?php

namespace Platform\Service\Providers;

use Platform\Service\Models\Service;
use Illuminate\Support\ServiceProvider;
use Platform\Service\Repositories\Caches\ServiceCacheDecorator;
use Platform\Service\Repositories\Eloquent\ServiceRepository;
use Platform\Service\Repositories\Interfaces\ServiceInterface;
use Platform\Base\Supports\Helper;
use Illuminate\Support\Facades\Event;
use Platform\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;
use League\OAuth1\Client\Server\Server;

class ServiceServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(ServiceInterface::class, function () {
            return new ServiceCacheDecorator(new ServiceRepository(new Service));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        \SlugHelper::registerModule(Service::class, 'Services');
        \SlugHelper::setPrefix(Service::class, 'dich-vu');
        $this->setNamespace('plugins/service')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishTranslations()
            ->loadAndPublishViews()
            ->loadRoutes(['web']);

        Event::listen(RouteMatched::class, function () {
            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-service',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => 'plugins/service::service.name',
                'icon'        => 'far fa-newspaper',
                'url'         => route('service.index'),
                'permissions' => ['service.index'],
            ]);
        });

        $modules = [Service::class];
        if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
            \Language::registerModule($modules);
        }
        $this->app->booted(function () use ($modules) {
            \SeoHelper::registerModule($modules);
        });

        $this->app->booted(function () {

            if (defined('CUSTOM_FIELD_MODULE_SCREEN_NAME')) {
                \CustomField::registerModule(Service::class)
                    ->registerRule('basic', trans('plugins/service::service.name'), Service::class, function () {
                        return $this->app->make(ServiceInterface::class)->pluck('app_services.name', 'app_services.id');
                    })
                    ->expandRule('other', trans('plugins/custom-field::rules.model_name'), 'model_name', function () {
                        return [
                            Service::class => trans('plugins/service::service.name'),
                        ];
                    });
            }
        });

        $this->app->register(HookServiceProvider::class);
    }
}
