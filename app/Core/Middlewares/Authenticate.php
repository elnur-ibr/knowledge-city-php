<?php

namespace App\Core\Middlewares;

use App\Core\Auth;
use App\Core\Exceptions\UnAuthorizedException;
use DateTime;

class Authenticate implements MiddlewareInterface
{
    /**
     *
     */
    public function handle()
    {
        $token = explode(' ', $_SERVER['HTTP_AUTHORIZATION'] ?? '')[1] ?? false;

        if (
            !$token
            || !isset($_SESSION['token'])
            || !$_SESSION['token']
            || $token !== $_SESSION['token']
            || Auth::isExpired()
        ) {
            throw new UnAuthorizedException();
        }

        Auth::refreshSession();
    }
}