<?php

return [
    [
        'name' => 'Shareholdercateogries',
        'flag' => 'shareholdercateogry.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'shareholdercateogry.create',
        'parent_flag' => 'shareholdercateogry.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'shareholdercateogry.edit',
        'parent_flag' => 'shareholdercateogry.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'shareholdercateogry.destroy',
        'parent_flag' => 'shareholdercateogry.index',
    ],
];
