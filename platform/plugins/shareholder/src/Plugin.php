<?php

namespace Platform\Shareholder;

use Illuminate\Support\Facades\Schema;
use Platform\PluginManagement\Abstracts\PluginOperationAbstract;

class Plugin extends PluginOperationAbstract
{
    public static function remove()
    {
        Schema::dropIfExists('app_shareholders');
    }
}
