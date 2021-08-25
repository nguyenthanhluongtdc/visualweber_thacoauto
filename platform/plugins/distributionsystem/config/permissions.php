<?php

return [
    [
        'name' => 'Distributionsystems',
        'flag' => 'distributionsystem.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'distributionsystem.create',
        'parent_flag' => 'distributionsystem.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'distributionsystem.edit',
        'parent_flag' => 'distributionsystem.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'distributionsystem.destroy',
        'parent_flag' => 'distributionsystem.index',
    ],
];
