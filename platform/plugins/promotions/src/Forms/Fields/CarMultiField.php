<?php

namespace Platform\Promotions\Forms\Fields;

use Kris\LaravelFormBuilder\Fields\FormField;

class CarMultiField extends FormField
{

    /**
     * {@inheritDoc}
     */
    protected function getTemplate()
    {
        return 'plugins/promotions::cars.cars-multi';
    }
}
