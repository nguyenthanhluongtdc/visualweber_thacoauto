<?php

return [
    [
        'name' => 'Tenants',
        'flag' => 'tenant.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'tenant.create',
        'parent_flag' => 'tenant.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'tenant.edit',
        'parent_flag' => 'tenant.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'tenant.destroy',
        'parent_flag' => 'tenant.index',
    ],
];
