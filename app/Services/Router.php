<?php

namespace App\Services;

class Router extends BaseService
{
    /**
     * @var array
     */
    public $routes = [];

    /**
     * @var string
     */
    public $routePath = __DIR__ . '/../../routes';

    /**
     * @return $this
     */
    public function init(): self
    {
        $routeFiles = glob($this->routePath . '/*.php');

        foreach ($routeFiles as $routeFile) {
            $routes = require $routeFile;

            $this->routes = array_merge($this->routes, $routes);
        }

        return $this;
    }

    /**
     * @param string $uri
     * @return mixed|null
     */
    public function get(string $uri)
    {
        return $this->routes[$uri] ?? null;
    }
}