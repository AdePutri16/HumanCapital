<?php

return [


    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

 

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        // 'pegawai' => [
        // 'driver' => 'session',
        // 'provider' => 'pegawai',  // Provider untuk model Pegawai
    ],


    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' =>  App\Models\User::class,
        ],

       'pegawai' => [
        'driver' => 'eloquent',
        'model' => App\Models\Pegawai::class,  // Model Pegawai
    ],
    ],

   
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],
'guards' => [
    'sanctum' => [
        'driver' => 'sanctum',
        'provider' => 'users',
    ],
],


    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
