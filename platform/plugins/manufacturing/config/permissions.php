<?php

return [
    [
        'name' => 'Manufacturings',
        'flag' => 'manufacturing.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'manufacturing.create',
        'parent_flag' => 'manufacturing.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'manufacturing.edit',
        'parent_flag' => 'manufacturing.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'manufacturing.destroy',
        'parent_flag' => 'manufacturing.index',
    ],
];
