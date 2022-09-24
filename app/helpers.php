<?php

use App\Application;

if (!function_exists('config')) {

    /**
     * @param $key
     * @return mixed|null
     */
    function config($key)
    {
        return Application::$config->get($key);
    }
}

if (!function_exists('dd')) {

    /**
     * @param $key
     * @return mixed|null
     */
    function dd()
    {
        $args = func_get_args();
        foreach($args as $arg) {
            var_dump($arg);
        }

        die();
    }
}

if (!function_exists('request')) {

    /**
     * @param $key
     * @return mixed|null
     */
    function request()
    {
        return Application::$request;
    }
}
