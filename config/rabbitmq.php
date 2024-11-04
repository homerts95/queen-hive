<?php

return [
    'host' => env('RABBITMQ_HOST', 'rabbitmq'),
    'port' => env('RABBITMQ_PORT', 5672),
    'user' => env('RABBITMQ_USER', 'hiveuser'),
    'password' => env('RABBITMQ_PASSWORD', 'hivepass'),
    'vhost' => env('RABBITMQ_VHOST', '/'),

    'queue' => [
        'default' => [
            'name' => 'default',
            'durable' => true,
            'auto_delete' => false,
        ],
    ],

    'exchange' => [
        'default' => [
            'name' => 'default',
            'type' => 'direct',
            'durable' => true,
        ],
    ],
];
