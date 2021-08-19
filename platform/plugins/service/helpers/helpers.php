<?php

use Platform\Service\Repositories\Interfaces\ServiceInterface;

if (!function_exists('get_services')) {
    /**
     * get all services function
     *
     * @param boolean $isSupport
     * @return void
     */
    function get_services($isSupport = false)
    {
        return app(ServiceInterface::class)->advancedGet([
            'condition' => [
                'is_support' => $isSupport ? 1 : 0
            ],
            'order_by' => [
                'order' => 'desc',
                'created_at' => 'desc'
            ]
        ]);
    }
}
