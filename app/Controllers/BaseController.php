<?php

namespace App\Controllers;

use App\Core\Request;

abstract class BaseController
{
    public static function execute($action, Request $request)
    {

        return (new static)->{$action}($request);
    }
}