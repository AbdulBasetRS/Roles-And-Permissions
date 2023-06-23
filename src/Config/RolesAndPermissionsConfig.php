<?php
    return [
        'table_relationship' => 'users',
        'activities' =>[
            'Role' => true,
            'Permission' => true,
            'RoleHasPermission' => true,
            'UserHasRole' => true
        ]
    ];
        