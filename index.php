<?php

use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

use Middleware\AuthMiddleware;
use Middleware\NivelMiddleware;
require 'vendor/autoload.php';

session_start();
$routes = require 'routes.php';

$dispatcher = simpleDispatcher(function (RouteCollector $r) use ($routes) {
    foreach ($routes as $route) {
        [$method, $path, $handler] = $route;
        $r->addRoute($method, $path, $handler);
    }
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$basePath = '/trabEstagios';
if (strpos($uri, $basePath) === 0) {
    $uri = substr($uri, strlen($basePath));
}

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        http_response_code(404);
        echo 'Página não encontrada!';
        break;

    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        http_response_code(405);
        echo 'Método não permitido!';
        break;

    case FastRoute\Dispatcher::FOUND:
        $routeAtual = $uri;
        $middlewares = [];

        foreach ($routes as $route) {
            if ($route[1] === $routeAtual) {
                $middlewares = isset($route[3]) ? $route[3] : []; 
                break;
            }
        }

        foreach ($middlewares as $middleware) {
            if (is_array($middleware)) {
                $middlewareName = $middleware[0]; 
                $params = isset($middleware[1]) ? (array) $middleware[1] : []; 
            } else {
                $middlewareName = $middleware;
                $params = [];
            }
        
            if (class_exists($middlewareName)) {
                $middlewareInstance = new $middlewareName(...$params); 
        
                if (method_exists($middlewareInstance, 'handle')) {
                    $middlewareInstance->handle(function() {
                    });
                } else {
                    echo "O método 'handle' não foi encontrado no middleware {$middlewareName}.";
                    exit;
                }
            } else {
                echo "Middleware {$middlewareName} não encontrado.";
                exit;
            }
        }
        

        [$controller, $method] = explode('@', $routeInfo[1]);
        $controllerClass = "Controller\\{$controller}";
        $controllerFile = "./controllers/{$controller}.php";

        if (file_exists($controllerFile)) {
            require_once $controllerFile;
            if (class_exists($controllerClass)) {
                $instance = new $controllerClass();
                if (method_exists($instance, $method)) {
                    call_user_func_array([$instance, $method], $routeInfo[2]);
                } else {
                    echo "Método {$method} não encontrado no controlador {$controller}.";
                }
            } else {
                echo "Classe {$controllerClass} não encontrada.";
            }
        } else {
            echo "Controlador {$controller} não encontrado.";
        }
        break;
}
