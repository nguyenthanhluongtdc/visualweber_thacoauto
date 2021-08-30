<?php

namespace Platform\CarCategory\Providers;

use Menu;
use Illuminate\Support\Facades\Auth;
use Platform\CarCategory\Models\CarCategory;
use Illuminate\Support\ServiceProvider;
use Platform\CarCategory\Services\CarCategoryService;

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
        return (new CarCategoryService)->handleFrontRoutes($slug);
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
