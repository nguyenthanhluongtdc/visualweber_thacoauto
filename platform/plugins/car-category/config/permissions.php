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
];
