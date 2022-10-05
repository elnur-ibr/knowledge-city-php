<?php

use App\Controllers\StudentController;
use App\Core\Middlewares\Authenticate;
use App\Core\Middlewares\StartSession;
use App\Controllers\UserController;

return [
    'api/auth/login' => [
        'method'     => 'post',
        'controller' => UserController::class,
        'action'     => 'login',
        'middlewares' => [
            StartSession::class,
        ]
    ],
    'api/auth/logout' => [
        'method'     => 'delete',
        'controller' => UserController::class,
        'action'     => 'logout',
        'middlewares' => [
            StartSession::class,
            Authenticate::class
        ]
    ],
    'api/student' => [
        'method'     => 'get',
        'controller' => StudentController::class,
        'action'     => 'index',
        'middlewares' => [
            StartSession::class,
            Authenticate::class
        ]
    ],
];
