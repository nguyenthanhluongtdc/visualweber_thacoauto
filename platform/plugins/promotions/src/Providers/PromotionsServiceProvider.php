<?php

namespace Platform\Promotions\Providers;

use Platform\Promotions\Models\Promotions;
use Illuminate\Support\ServiceProvider;
use Platform\Promotions\Repositories\Caches\PromotionsCacheDecorator;
use Platform\Promotions\Repositories\Eloquent\PromotionsRepository;
use Platform\Promotions\Repositories\Interfaces\PromotionsInterface;
use Platform\Base\Supports\Helper;
use Illuminate\Support\Facades\Event;
use Platform\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class PromotionsServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(PromotionsInterface::class, function () {
            return new PromotionsCacheDecorator(new PromotionsRepository(new Promotions));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/promotions')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishTranslations()
            ->loadAndPublishViews()
            ->loadRoutes(['web']);

        Event::listen(RouteMatched::class, function () {
            if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
               \Language::registerModule([Promotions::class]);
            }

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-promotions',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => 'plugins/promotions::promotions.name',
                'icon'        => 'fas fa-percent',
                'url'         => route('promotions.index'),
                'permissions' => ['promotions.index'],
            ]);
        });
    }
}
