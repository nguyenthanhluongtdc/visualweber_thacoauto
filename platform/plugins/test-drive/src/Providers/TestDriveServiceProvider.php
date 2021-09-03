<?php

namespace Platform\TestDrive\Providers;

use Platform\TestDrive\Models\TestDrive;
use Illuminate\Support\ServiceProvider;
use Platform\TestDrive\Repositories\Caches\TestDriveCacheDecorator;
use Platform\TestDrive\Repositories\Eloquent\TestDriveRepository;
use Platform\TestDrive\Repositories\Interfaces\TestDriveInterface;
use Platform\Base\Supports\Helper;
use Illuminate\Support\Facades\Event;
use Platform\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class TestDriveServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(TestDriveInterface::class, function () {
            return new TestDriveCacheDecorator(new TestDriveRepository(new TestDrive));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/test-drive')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishTranslations()
            ->loadAndPublishViews()
            ->loadRoutes(['web']);

        Event::listen(RouteMatched::class, function () {
            // if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
            //    \Language::registerModule([TestDrive::class]);
            // }

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-test-drive',
                'priority'    => 5,
                'parent_id'   => null,
                'name'        => 'plugins/test-drive::test-drive.name',
                'icon'        => 'fas fa-truck',
                'url'         => route('test-drive.index'),
                'permissions' => ['test-drive.index'],
            ]);
        });
    }
}
