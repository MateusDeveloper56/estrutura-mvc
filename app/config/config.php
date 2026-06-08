<?php 
return [
    'db' => [
        'host' => $_ENV['HOST'] ?? 'localhost',
        'dbname' => $_ENV['DB_NAME'] ?? 'mvc',
        'username' => $_ENV['DB_USER'] ?? 'root',
        'password' => $_ENV['DB_PASSWORD'] ?? '',
        'charset' => $_ENV['DB_CHARSET'] ?? 'utf8mb4'
    ],
    'app' => [
        'name' => 'Minha Aplicação MVC em PHP'
    ]
];


