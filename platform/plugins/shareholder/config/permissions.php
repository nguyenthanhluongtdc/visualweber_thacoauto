<?php

return [
    [
        'name' => 'Shareholders',
        'flag' => 'shareholder.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'shareholder.create',
        'parent_flag' => 'shareholder.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'shareholder.edit',
        'parent_flag' => 'shareholder.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'shareholder.destroy',
        'parent_flag' => 'shareholder.index',
    ],
];
