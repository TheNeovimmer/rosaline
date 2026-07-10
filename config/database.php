<?php
return [
    'host'     => getenv('DB_HOST') ?: 'db',
    'port'     => getenv('DB_PORT') ?: '3306',
    'database' => getenv('DB_DATABASE') ?: 'rosaline',
    'username' => getenv('DB_USERNAME') ?: 'root',
    'password' => getenv('DB_PASSWORD') ?: 'root',
    'charset'  => getenv('DB_CHARSET') ?: 'utf8mb4',
];
