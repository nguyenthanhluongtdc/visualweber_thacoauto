<?php

namespace Platform\Car\Forms\Fields;

use Kris\LaravelFormBuilder\Fields\FormField;

class CarCategoryMultiField extends FormField
{

    /**
     * {@inheritDoc}
     */
    protected function getTemplate()
    {
        return 'plugins/car::categories.categories-multi';
    }
}
