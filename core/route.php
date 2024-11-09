<?php

class Router {
    private $routes = [];

    public function addRoute($method, $path, $handler) {
        // Convert route parameters to regex pattern
        $pattern = preg_replace('/\{([a-zA-Z0-9_]+)}/', '(?P<$1>[^/]+)', $path);
        $pattern = "#^{$pattern}$#";

        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'pattern' => $pattern,
            'handler' => $handler
        ];
    }

    public function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        foreach ($this->routes as $route) {
            if ($route['method'] === $method && preg_match($route['pattern'], $path, $matches)) {
                // Remove numeric keys from matches
                $params = array_filter($matches, function($key) {
                    return !is_numeric($key);
                }, ARRAY_FILTER_USE_KEY);

                // Retrieve controller and action
                list($controller, $action) = $route['handler'];
                $controllerFile = "controllers/{$controller}.php";

                if (file_exists($controllerFile)) {
                    require_once $controllerFile;
                    $controllerInstance = new $controller();
                    // Pass the parameters to the controller method
                    call_user_func_array([$controllerInstance, $action], $params);
                    return;
                }
            }
        }

        // 404 if no route matches
        header("HTTP/1.0 404 Not Found");
        echo "404 Not Found error bos";
    }
}
