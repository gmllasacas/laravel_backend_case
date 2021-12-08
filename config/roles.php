<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Roles and scopes
    |--------------------------------------------------------------------------
    |
    | Here you may configure the scopes by role.
    | This data is set in this config file, but It would be possible
    | manage it from a different source as a data base, or getting the scope
    | direct from the user or token with a different way to do an introspection.
    |
    */

    '1' => [ //admin
        'scopes' => [
            'user:create',
            'user:get',
            'employee:create',
            'employee:get',
            'employee:update',
            'employee:all',
            'employee:list',
            'employee:delete',
        ]
    ],
    '2' => [ //standard
        'scopes' => [
            'user:get',
            'employee:get',
            'employee:update',
        ]
    ],
    '3' => [ //manager
        'scopes' => []
    ],

];
