<?php

return [
    [
        'name' => 'More consultancies',
        'flag' => 'more-consultancy.index',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'more-consultancy.create',
        'parent_flag' => 'more-consultancy.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'more-consultancy.edit',
        'parent_flag' => 'more-consultancy.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'more-consultancy.destroy',
        'parent_flag' => 'more-consultancy.index',
    ],
];
