<?php

namespace App\Services;

class Config
{
    /**
     * @var array
     */
    public $config;

    /**
     * @var string
     */
    public $configPath = __DIR__ . '/../../config';


    /**
     * @return void
     */
    public function init(): void
    {
        $configFiles = glob($this->configPath . '/*.php');

        foreach ($configFiles as $configFile) {

            $key = pathinfo($configFile)['filename'];

            $this->config[$key] = require $configFile;
        }
    }

    public function get($key)
    {
        if (str_contains($key, '.')) {
            $config = $this->config;
            foreach (explode('.', $key) as $part) {
                $config = $config[$part] ?? null;
            }

            return $config;
        }

        return $this->config[$key] ?? null;
    }
}