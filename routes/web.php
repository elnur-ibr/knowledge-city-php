<?php

use App\Controllers\UserController;

return [
    'api/auth/login' => [
        'method'     => 'post', //TODO temporarily get
        'controller' => UserController::class,
        'action'     => 'login',
    ],

];
