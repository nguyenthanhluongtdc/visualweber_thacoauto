<?php

return [
    [
        'name' => 'Bankloans',
        'flag' => 'bankloans.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'bankloans.create',
        'parent_flag' => 'bankloans.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'bankloans.edit',
        'parent_flag' => 'bankloans.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'bankloans.destroy',
        'parent_flag' => 'bankloans.index',
    ],
];
