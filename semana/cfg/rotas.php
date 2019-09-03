<?php

$rotas = [
    '/' => [
        'GET' => '\Controlador\InicialControlador#index',
    ],
    '/desafio' => [
        'GET' => '\Controlador\DesafioControlador#index',
    ],
    '/login' => [
        'GET' => '\Controlador\LoginControlador#criar',
        'POST' => '\Controlador\LoginControlador#armazenar',
        'DELETE' => '\Controlador\LoginControlador#destruir',
    ],
];
