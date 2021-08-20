<?php

use Illuminate\Support\Arr;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Base\Supports\SortItemsWithChildrenHelper;
use Platform\Car\Repositories\Interfaces\BrandInterface;
use Platform\Car\Repositories\Interfaces\CarCategoryInterface;
use Platform\Car\Repositories\Interfaces\CarInterface;

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

if (!function_exists('get_cars')) {
    /**
     * @param array $args
     * @return \Illuminate\Support\Collection|mixed
     */
    function get_cars(array $args = [])
    {
        $indent = Arr::get($args, 'indent', '——');

        $repo = app(CarInterface::class);

        $cars = $repo->advancedGet([
            'order_by'  => [
                'created_at' => 'DESC',
                'order'      => 'ASC',
            ],
            'select'    => Arr::get($args, 'select', ['*'])
        ]);

        $cars = sort_item_with_children($cars);

        foreach ($cars as $car) {
            $indentText = '';
            $depth = (int)$car->depth;
            for ($index = 0; $index < $depth; $index++) {
                $indentText .= $indent;
            }
            $car->indent_text = $indentText;
        }

        return $cars;
    }
}

if (!function_exists('get_car_categories_with_children')) {
    /**
     * @return \Illuminate\Support\Collection
     * @throws Exception
     */
    function get_car_categories_with_children()
    {
        $categories = app(CarCategoryInterface::class)
            ->advancedGet([
                'condition' => ['status' => BaseStatusEnum::PUBLISHED],
                'select' => ['id', 'name', 'parent_id']
            ]);

        return app(SortItemsWithChildrenHelper::class)
            ->setChildrenProperty('child_cats')
            ->setItems($categories)
            ->sort();
    }
}

if (!function_exists('get_categories_parent')) {
    /**
     * Get all brand parents function
     *
     * @return void
     */
    function get_categories_parent()
    {
        return app(CarCategoryInterface::class)
            ->advancedGet([
                'condition' => [
                    'status' => BaseStatusEnum::PUBLISHED,
                    'parent_id' => 0
                ],
                'order_by'  => [
                    'created_at' => 'ASC',
                    'order' => 'DESC'
                ],
                'select'    => ['*'],
                'with'      => ['children'],
            ]);
    }
}
