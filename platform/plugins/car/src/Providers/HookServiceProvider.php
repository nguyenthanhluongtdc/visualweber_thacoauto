<?php

namespace Platform\Car\Providers;

use Menu;
use Illuminate\Support\Facades\Auth;
use Platform\CarCategory\Models\CarCategory;
use Illuminate\Support\ServiceProvider;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Car\Providers\CarServiceProvider;
use Platform\Car\Services\CarService;

class HookServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if (defined('MENU_ACTION_SIDEBAR_OPTIONS')) {
            Menu::addMenuOptionModel(CarCategory::class);
            add_action(MENU_ACTION_SIDEBAR_OPTIONS, [$this, 'registerMenuOptions'], 5);
        }
        add_filter(BASE_FILTER_PUBLIC_SINGLE_DATA, [$this, 'handleSingleView'], 2);
        
    }

    
    /**
     * @param Eloquent $slug
     * @return array|Eloquent
     * @throws BindingResolutionException
     */
    public function handleSingleView($slug)
    {
        return (new CarService)->handleFrontRoutes($slug);
    }

      /**
     * Register sidebar options in menu
     * @throws Throwable
     */
    public function registerMenuOptions()
    {

        if (Auth::user()->hasPermission('car-category.index')) {
            Menu::registerMenuOptions(CarCategory::class, __('Danh mục xe'));
        }
    }
}
