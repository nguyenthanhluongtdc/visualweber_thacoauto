<?php

namespace Platform\DistributionSystem;

use Illuminate\Support\Facades\Schema;
use Platform\PluginManagement\Abstracts\PluginOperationAbstract;

class Plugin extends PluginOperationAbstract
{
    public static function remove()
    {
        Schema::dropIfExists('app_distribution_systems');
        Schema::dropIfExists('app_showrooms');
    }
}
