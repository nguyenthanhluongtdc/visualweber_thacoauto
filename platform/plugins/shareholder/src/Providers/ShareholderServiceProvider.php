<?php

namespace Platform\Shareholder\Providers;

use Platform\Shareholder\Models\Shareholder;
use Illuminate\Support\ServiceProvider;
use Platform\Shareholder\Repositories\Caches\ShareholderCacheDecorator;
use Platform\Shareholder\Repositories\Eloquent\ShareholderRepository;
use Platform\Shareholder\Repositories\Interfaces\ShareholderInterface;
use Platform\Base\Supports\Helper;
use Illuminate\Support\Facades\Event;
use Platform\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class ShareholderServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(ShareholderInterface::class, function () {
            return new ShareholderCacheDecorator(new ShareholderRepository(new Shareholder));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/shareholder')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishTranslations()
            ->loadAndPublishViews()
            ->loadRoutes(['web']);

        Event::listen(RouteMatched::class, function () {
            // if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
            //    \Language::registerModule([Shareholder::class]);
            // }

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-shareholder',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => __('Quan hệ cổ đông'),
                'icon'        => 'fas fa-file-contract',
            ])
            ->registerItem([
                'id'          => 'cms-plugins-shareholder-child',
                'priority'    => 5,
                'parent_id'   => 'cms-plugins-shareholder',
                'name'        => __('Quan hệ cổ đông'),
                'url'         => route('shareholder.index'),
                'permissions' => ['shareholder.index'],
            ]);
        });

            \SlugHelper::registerModule(Shareholder::class);
            \SlugHelper::setPrefix(Shareholder::class, 'shareholder');
    }
}
