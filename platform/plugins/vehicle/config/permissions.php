<?php

return [
    [
        'name' => 'Vehicles',
        'flag' => 'vehicle.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'vehicle.create',
        'parent_flag' => 'vehicle.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'vehicle.edit',
        'parent_flag' => 'vehicle.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'vehicle.destroy',
        'parent_flag' => 'vehicle.index',
    ],
];
