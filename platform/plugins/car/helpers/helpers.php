<?php

use Illuminate\Support\Arr;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Base\Supports\SortItemsWithChildrenHelper;
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
