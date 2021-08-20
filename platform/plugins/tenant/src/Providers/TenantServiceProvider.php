<?php

namespace Platform\Tenant\Providers;

use Platform\Tenant\Models\Tenant;
use Illuminate\Support\ServiceProvider;
use Platform\Tenant\Repositories\Caches\TenantCacheDecorator;
use Platform\Tenant\Repositories\Eloquent\TenantRepository;
use Platform\Tenant\Repositories\Interfaces\TenantInterface;
use Platform\Base\Supports\Helper;
use Illuminate\Support\Facades\Event;
use Platform\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class TenantServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(TenantInterface::class, function () {
            return new TenantCacheDecorator(new TenantRepository(new Tenant));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/tenant')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishTranslations()
            ->loadAndPublishViews()
            ->loadRoutes(['web']);

        Event::listen(RouteMatched::class, function () {
            // if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
            //    \Language::registerModule([Tenant::class]);
            // }

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-tenant',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => 'plugins/tenant::tenant.name',
                'icon'        => 'fas fa-random',
                'url'         => route('tenant.index'),
                'permissions' => ['tenant.index'],
            ]);
        });
    }
}
