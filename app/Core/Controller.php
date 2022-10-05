<?php

namespace App\Core;

use App\Core\Request;

abstract class Controller
{
    public static function execute($action, Request $request)
    {

        return (new static)->{$action}($request);
    }
}