<?php
// src/app/Route.php
namespace App;
class Route {
    private static $routes = [];

    public static function get($path, $action) {
        self::$routes['GET'][$path] = $action;
    }

    public static function post($path, $action) {
        self::$routes['POST'][$path] = $action;
    }

    public static function dispatch($uri, $method) {
        if (isset(self::$routes[$method][$uri])) {
            $action = self::$routes[$method][$uri];
            list($controllerName, $actionName) = $action;

            if (class_exists($controllerName)) {
                $controller = new $controllerName();
                if (method_exists($controller, $actionName)) {
                    $controller->$actionName();
                } else {
                    echo "Action $actionName not found in controller $controllerName";
                }
            } else {
                echo "Controller $controllerName not found";
            }
        } else {
            echo "No route matched.";
        }
    }
}





