<?php

namespace App\Core;

abstract class BaseService implements BaseServiceInterface
{
    public static function register()
    {
        return (new static)->init();
    }
}