<?php

namespace App\Services;

class Config extends BaseService
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
     * @return self
     */
    public function init(): self
    {
        $configFiles = glob($this->configPath . '/*.php');

        foreach ($configFiles as $configFile) {

            $key = pathinfo($configFile)['filename'];

            $this->config[$key] = require $configFile;
        }

        return $this;
    }

    /**
     * @param $key
     * @return array|mixed|null
     */
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