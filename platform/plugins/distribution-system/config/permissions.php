<?php

return [
    [
        'name' => 'Distribution systems',
        'flag' => 'distribution-system.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'distribution-system.create',
        'parent_flag' => 'distribution-system.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'distribution-system.edit',
        'parent_flag' => 'distribution-system.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'distribution-system.destroy',
        'parent_flag' => 'distribution-system.index',
    ],
    [
        'name' => 'Showrooms',
        'flag' => 'showroom.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'showroom.create',
        'parent_flag' => 'showroom.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'showroom.edit',
        'parent_flag' => 'showroom.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'showroom.destroy',
        'parent_flag' => 'showroom.index',
    ],
    [
        'name' => 'Showroom brands',
        'flag' => 'showroom-brand.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'showroom-brand.create',
        'parent_flag' => 'showroom-brand.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'showroom-brand.edit',
        'parent_flag' => 'showroom-brand.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'showroom-brand.destroy',
        'parent_flag' => 'showroom-brand.index',
    ],
];
