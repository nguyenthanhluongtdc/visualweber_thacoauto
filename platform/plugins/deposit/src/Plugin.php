<?php

namespace Platform\Deposit;

use Illuminate\Support\Facades\Schema;
use Platform\PluginManagement\Abstracts\PluginOperationAbstract;

class Plugin extends PluginOperationAbstract
{
    public static function remove()
    {
        Schema::dropIfExists('app_deposits');
    }
}
