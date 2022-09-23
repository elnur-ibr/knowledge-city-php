<?php

namespace App;

use App\Services\Config;

class Application
{
    /**
     * @var Config
     */
    public static $config;

    public function run()
    {
        $this->config();
        var_dump(config('database.xexe'));
    }

    public function config()
    {
        static::$config = new Config();
        static::$config->init();
    }
}