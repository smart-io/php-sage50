<?php

return [
    'connection' => [
        'driver' => 'pdo_mysql',
        'host' => 'localhost',
        'dbname' => 'my_dbname',
        'user' => 'root',
        'password' => '',
        'charset' => 'latin1',
        'is_dev_mode' => true,
        'debug' => true,
        'paths' => [
            __DIR__ . '/../src/Sage50'
        ],
        'cache' => null,
        'second_level_cache' => false,
        'proxy_dir' => null,
    ]
];
