<?php

return [
    [
        'name' => 'Car categories',
        'flag' => 'car-category.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'car-category.create',
        'parent_flag' => 'car-category.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'car-category.edit',
        'parent_flag' => 'car-category.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'car-category.destroy',
        'parent_flag' => 'car-category.index',
    ],
    [
        'name' => 'Brands',
        'flag' => 'brand.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'brand.create',
        'parent_flag' => 'brand.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'brand.edit',
        'parent_flag' => 'brand.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'brand.destroy',
        'parent_flag' => 'brand.index',
    ],
];
