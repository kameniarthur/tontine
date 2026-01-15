<?php

namespace Framework;

class Router
{
    private static $routes = [];

    public static function get($uri, $action)
    {
        self::$routes['GET'][$uri] = $action;
    }

    public static function post($uri, $action)
    {
        self::$routes['POST'][$uri] = $action;
    }

    public static function dispatch($method, $uri)
    {
        $action = self::$routes[$method][$uri] ?? null;

        if (!$action) {
            http_response_code(404);
            echo "404 Not Found";
            return;
        }

        if (is_callable($action)) {
            return call_user_func($action);
        }

        // Exemple: "UserController@index"
        [$controller, $method] = explode('@', $action);
        $controller = "App\\Controllers\\$controller";
        return (new $controller)->$method();
    }
}
