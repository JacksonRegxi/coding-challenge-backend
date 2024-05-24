<?php

namespace App;

use Exception;
use JetBrains\PhpStorm\NoReturn;

class Router
{
    protected array $routes = [];

    private function addRoute($route, $controller, $action, $method): void
    {

        $this->routes[$method][$route] = ['controller' => $controller, 'action' => $action];
    }

    public function get($route, $controller, $action): void
    {
        $this->addRoute($route, $controller, $action, "GET");
    }

    public function post($route, $controller, $action): void
    {
        $this->addRoute($route, $controller, $action, "POST");
    }

    /**
     * @throws Exception
     */
    public function dispatch(): void
    {
        $uri = strtok($_SERVER['REQUEST_URI'], '?');
        $method =  $_SERVER['REQUEST_METHOD'];

        if (array_key_exists($uri, $this->routes[$method])) {
            $controller = $this->routes[$method][$uri]['controller'];
            $action = $this->routes[$method][$uri]['action'];

            $controller = new $controller();
            $controller->$action();
        } else {
            $this->abort(message: "Route not found: $uri");
        }
    }

    #[NoReturn] function abort($message, $code = 404): void
    {

        http_response_code($code);
        echo $message;
        exit();
    }
}