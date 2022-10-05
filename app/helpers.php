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


if (!function_exists('abort')) {

    /**
     * @param $key
     * @return mixed|null
     */
    function abort()
    {
        return Application::$request;
    }
}

if (!function_exists('generateRandomString')) {

    /**
     * @param int $length
     * @return string
     */
    function generateRandomString($length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
}
