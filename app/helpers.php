<?php

if (!function_exists('config')) {

    /**
     * @param $key
     * @return mixed|null
     */
    function config($key)
    {
        return \App\Application::$config->get($key);
    }
}
