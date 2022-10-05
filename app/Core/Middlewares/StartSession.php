<?php

namespace App\Core\Middlewares;

class StartSession implements MiddlewareInterface
{
    /**
     *
     */
    public function handle()
    {
        session_start();
    }
}