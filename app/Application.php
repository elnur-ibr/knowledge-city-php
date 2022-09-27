<?php

namespace App;

use App\Exceptions\RouteException;
use App\Core\Config;
use App\Core\Request;
use App\Core\Router;

class Application
{
    /**
     * @var Config
     */
    public static $config;

    /**
     * @var
     */
    public static $router;

    /**
     * @var Request
     */
    public static $request;

    public function run()
    {
        $route = static::$router->get(request()->uri);

        if (is_null($route)) {
            throw new RouteException("There is no route like " . request()->uri . "!");
        }

        if (strtolower($route['method']) != request()->method) {
            throw new RouteException(strtoupper(request()->method) . " method not supported for this route.");
        }

        $controllerClass = $route['controller'];

        $controllerClass::execute($route['action'], request());
    }

    /**
     * @return void
     */
    public function register(): void
    {
        $this->registerConfig();
        $this->registerRoutes();
        $this->registerRequest();
    }

    /**
     * @return void
     */
    public function registerConfig(): void
    {
        static::$config = Config::register();
    }

    /**
     * @return void
     */
    public function registerRoutes(): void
    {
        static::$router = Router::register();
    }

    /**
     * @return void
     */
    public function registerRequest(): void
    {
        static::$request = Request::register();
    }
}