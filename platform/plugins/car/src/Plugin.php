<?php

namespace Platform\Car;

use Illuminate\Support\Facades\Schema;
use Platform\PluginManagement\Abstracts\PluginOperationAbstract;

class Plugin extends PluginOperationAbstract
{
    public static function remove()
    {
        Schema::dropIfExists('app_cars');
        Schema::dropIfExists('app_colors');
        Schema::dropIfExists('app_accessories');
        Schema::dropIfExists('app_equipment');
    }
}
