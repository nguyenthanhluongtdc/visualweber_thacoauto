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
        'name' => 'City provinces',
        'flag' => 'city-province.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'city-province.create',
        'parent_flag' => 'city-province.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'city-province.edit',
        'parent_flag' => 'city-province.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'city-province.destroy',
        'parent_flag' => 'city-province.index',
    ],

    [
        'name' => 'Branches',
        'flag' => 'branch.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'branch.create',
        'parent_flag' => 'branch.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'branch.edit',
        'parent_flag' => 'branch.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'branch.destroy',
        'parent_flag' => 'branch.index',
    ],
];
