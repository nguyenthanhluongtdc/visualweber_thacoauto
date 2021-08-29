<?php

namespace Platform\Service\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Menu;
use Platform\Service\Models\Service;

class HookServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if (defined('MENU_ACTION_SIDEBAR_OPTIONS')) {
            Menu::addMenuOptionModel(Service::class);
            add_action(MENU_ACTION_SIDEBAR_OPTIONS, [$this, 'registerMenuOptions'], 5);
        }
    }

    /**
     * Register sidebar options in menu
     * @throws Throwable
     */
    public function registerMenuOptions()
    {

        if (Auth::user()->hasPermission('tags.index')) {
            Menu::registerMenuOptions(Service::class, 'Dịch vụ');
        }
    }
}
