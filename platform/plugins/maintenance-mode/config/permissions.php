<?php

return [
    [
        'name' => 'Maintenance Mode',
        'flag' => 'system.maintenance.index',
        'parent_flag' => 'core.system'
    ],
    [
        'name'        => 'Chế độ bảo trì',
        'flag'        => 'system.maintenance.run',
        'parent_flag' => 'system.maintenance.index',
    ]
];
