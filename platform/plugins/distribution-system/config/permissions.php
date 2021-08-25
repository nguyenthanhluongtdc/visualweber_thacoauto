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
];
