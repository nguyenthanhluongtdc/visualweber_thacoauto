<?php

return [
    [
        'name' => 'Provinces',
        'flag' => 'province.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'province.create',
        'parent_flag' => 'province.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'province.edit',
        'parent_flag' => 'province.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'province.destroy',
        'parent_flag' => 'province.index',
    ],
];
