<?php

return [
    [
        'name' => 'Test drives',
        'flag' => 'test-drive.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'test-drive.create',
        'parent_flag' => 'test-drive.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'test-drive.edit',
        'parent_flag' => 'test-drive.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'test-drive.destroy',
        'parent_flag' => 'test-drive.index',
    ],
];
