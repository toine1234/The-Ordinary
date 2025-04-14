<?php

class Router
{
    private $routes = [];

    public function get($path, $callback)
    {
        $this->addRoute('GET', $path, $callback);
    }

    public function post($path, $callback)
    {
        $this->addRoute('POST', $path, $callback);
    }

    private function addRoute($method, $path, $callback)
    {
        $this->routes[] = compact('method', 'path', 'callback');
    }

    public function dispatch()
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $basePath = dirname($_SERVER['SCRIPT_NAME']); // eg: /The-Ordinary
        $requestUri = str_replace($basePath, '', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

        foreach ($this->routes as $route) {
            if ($route['method'] === $requestMethod && $route['path'] === $requestUri) {
                [$class, $method] = $route['callback'];
                require_once str_replace("\\", "/", $class) . ".php";
                call_user_func([new $class, $method]);
                return;
            }
        }

        http_response_code(404);
        echo "404 - Not Found";
    }

}
