<?php

return [
    [
        'name' => 'Deposits',
        'flag' => 'deposit.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'deposit.create',
        'parent_flag' => 'deposit.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'deposit.edit',
        'parent_flag' => 'deposit.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'deposit.destroy',
        'parent_flag' => 'deposit.index',
    ],
];
