<?php

return [
    'role_structure' => [
        'super_admin' => [
            'offers' => 'c,r,u,d',
            'departments' => 'c,r,u,d',
            'users' => 'c,r,u,d',
            'admins' => 'c,r,u,d',
            
        ],

        'admin'=>[]
        
    ],
    
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
