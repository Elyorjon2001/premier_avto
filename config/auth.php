<?php

return [

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    
        'admin' => [ // Admin uchun alohida guard qo‘shamiz
            'driver' => 'session',
            'provider' => 'admins',
        ],
    
        'api' => [
            'driver' => 'token',
            'provider' => 'users',
            'hash' => false,
        ],
    ],
    
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
    
        'admins' => [ // Admin provider qo‘shamiz
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],
    ],
    

];
