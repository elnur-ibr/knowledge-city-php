<?php

namespace App\Services;

abstract class BaseService implements BaseServiceInterface
{
    public static function register()
    {
        return (new static)->init();
    }
}