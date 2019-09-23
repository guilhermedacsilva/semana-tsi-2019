<?php

$rotas = [
    '/' => [
        'GET' => '\Controlador\InicialControlador#index',
    ],
    '/desafio' => [
        'GET' => '\Controlador\TesteControlador#irRaiz',
    ],
    '/login' => [
        'GET' => '\Controlador\TesteControlador#irRaiz',
    ],
    /*
    '/desafio' => [
        'GET' => '\Controlador\DesafioControlador#index',
        'POST' => '\Controlador\DesafioControlador#armazenar',
    ],
    '/login' => [
        'GET' => '\Controlador\LoginControlador#criar',
        'POST' => '\Controlador\LoginControlador#armazenar',
        'DELETE' => '\Controlador\LoginControlador#destruir',
    ],
    */
    /*
    '/atualizar' => [
        'GET' => '\Controlador\TesteControlador#index',
    ],
    */
];
