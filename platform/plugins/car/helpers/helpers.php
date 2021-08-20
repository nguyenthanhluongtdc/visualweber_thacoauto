<?php

use Illuminate\Support\Arr;
use Platform\Car\Repositories\Interfaces\CarCategoryInterface;

if (!function_exists('get_car_categories')) {
    /**
     * @param array $args
     * @return \Illuminate\Support\Collection|mixed
     */
    function get_car_categories(array $args = [])
    {
        $indent = Arr::get($args, 'indent', '——');

        $repo = app(CarCategoryInterface::class);

        $categories = $repo->advancedGet([
            'order_by'  => [
                'created_at' => 'DESC',
                'order'      => 'ASC',
            ],
            'select'    => Arr::get($args, 'select', ['*'])
        ]);

        $categories = sort_item_with_children($categories);

        foreach ($categories as $category) {
            $indentText = '';
            $depth = (int)$category->depth;
            for ($index = 0; $index < $depth; $index++) {
                $indentText .= $indent;
            }
            $category->indent_text = $indentText;
        }

        return $categories;
    }
}
