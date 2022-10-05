<?php

namespace App;

use App\Core\Exceptions\RouteException;
use App\Core\ExceptionHandler;
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

        ExceptionHandler::handle(function () use ($route) {
            if (is_null($route)) {
                throw new RouteException("There is no route like " . request()->uri . "!", 404);
            }

            if (strtolower($route['method']) != request()->method) {
                throw new RouteException(strtoupper(request()->method) . " method not supported for this route.", 405);
            }

            $this->middlewares($route);

            $controllerClass = $route['controller'];

            $controllerClass::execute($route['action'], request());
        });
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

    public function middlewares($route)
    {
        if (isset($route['middlewares'])) {
            foreach ($route['middlewares'] as $middlewareClass) {
                (new $middlewareClass)->handle();
            }
        }
    }
}