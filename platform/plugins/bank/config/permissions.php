<?php

return [
    [
        'name' => 'Banks',
        'flag' => 'bank.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'bank.create',
        'parent_flag' => 'bank.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'bank.edit',
        'parent_flag' => 'bank.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'bank.destroy',
        'parent_flag' => 'bank.index',
    ],
];
