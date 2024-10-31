<?php

/**
 * @param $controller
 * @param Router $callback
 * @return $this
 */
class Router extends Controller
{
    private $routes = [];
    private $currentPrefix = '';
    private $currentLayout = 'main';
    private $currentController = null;
    private $groupStack = [];

    public function __construct()
    {
        $this->layout = $this->currentLayout;
    }

    // HTTP Methods
    public function get($path, $action)
    {
        return $this->addRoute('GET', $path, $action);
    }

    public function post($path, $action)
    {
        return $this->addRoute('POST', $path, $action);
    }

    public function put($path, $action)
    {
        return $this->addRoute('PUT', $path, $action);
    }

    public function delete($path, $action)
    {
        return $this->addRoute('DELETE', $path, $action);
    }

    // Group attributes stack management
    private function pushGroup($attributes)
    {
        $this->groupStack[] = [
            'prefix' => $this->currentPrefix,
            'layout' => $this->layout,
            'controller' => $this->currentController
        ];

        if (isset($attributes['prefix'])) {
            $this->currentPrefix = trim($this->currentPrefix . '/' . trim($attributes['prefix'], '/'), '/');
        }
        if (isset($attributes['layout'])) {
            $this->layout = $attributes['layout'];
        }
        if (isset($attributes['controller'])) {
            $this->currentController = $attributes['controller'];
        }
    }

    private function popGroup()
    {
        $group = array_pop($this->groupStack);
        if ($group) {
            $this->currentPrefix = $group['prefix'];
            $this->layout = $group['layout'];
            $this->currentController = $group['controller'];
        }
    }

    // Controller group method


    public function controller($controller, callable|Router $callback)
    {
        $this->pushGroup(['controller' => $controller]);
        $callback($this);
        $this->popGroup();
        return $this;
    }

    // Prefix group method
    public function prefix($prefix, callable|Router $callback)
    {
        $this->pushGroup(['prefix' => $prefix]);
        $callback($this);
        $this->popGroup();
        return $this;
    }

    // Layout group method
    public function layouts($layout, callable|Router $callback)
    {
        $this->pushGroup(['layout' => $layout]);
        $callback($this);
        $this->popGroup();
        return $this;
    }

    // Combined group method
    public function group(array $attributes, callable $callback)
    {
        $this->pushGroup($attributes);
        $callback($this);
        $this->popGroup();
        return $this;
    }

    public function addRoute($method, $path, $action)
    {
        // Add current prefix to path
        $path = $this->currentPrefix
            ? '/' . trim($this->currentPrefix . '/' . trim($path, '/'), '/')
            : '/' . trim($path, '/');

        // Handle different action formats
        $handler = $this->resolveHandler($action);

        // Convert route parameters to regex pattern
        $pattern = preg_replace('/\{([a-zA-Z0-9_]+)}/', '(?P<$1>[^/]+)', $path);
        $pattern = "#^{$pattern}$#";

        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'pattern' => $pattern,
            'handler' => $handler,
            'layout' => $this->layout
        ];

        return $this;
    }

    private function resolveHandler($action)
    {
        // If action is just a method name string and we have a current controller
        if (is_string($action) && $this->currentController) {
            return [$this->currentController, $action];
        }

        // If action is [Controller::class, 'method'] format
        if (is_array($action) && count($action) === 2) {
            // If only method name is provided, use current controller
            if (is_string($action[0]) && $this->currentController) {
                return [$this->currentController, $action[1]];
            }
            return $action;
        }

        // If action is a closure or view array
        return $action;
    }

    public function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $path = '/' . trim($path, '/');

        foreach ($this->routes as $route) {
            if ($route['method'] === $method && preg_match($route['pattern'], $path, $matches)) {
                // Remove numeric keys from matches
                $params = array_filter($matches, function($key) {
                    return !is_numeric($key);
                }, ARRAY_FILTER_USE_KEY);

                // Set the layout for this route
                $this->layout = $route['layout'];

                $handler = $route['handler'];

                try {
                    // Handle controller class and method
                    if (is_array($handler)) {
                        list($controller, $action) = $handler;

                        if (is_string($controller)) {
                            $controllerFile = "controllers/" . basename(str_replace("\\", "/", $controller)) . ".php";
                            if (file_exists($controllerFile)) {
                                require_once $controllerFile;
                                $controllerInstance = new $controller();
                                return call_user_func_array([$controllerInstance, $action], $params);
                            }
                        } else {
                            return call_user_func_array([$controller, $action], $params);
                        }
                    } // Handle closure
                    elseif ($handler instanceof Closure) {
                        return call_user_func_array($handler, $params);
                    } // Handle view array
                    elseif (is_array($handler) && isset($handler['view'])) {
                        return parent::view($handler['view'], $handler['data'] ?? []);
                    }
                } catch (Exception $e) {
                    return $this->handleError($e);
                }
            }
        }

        return $this->handleNotFound();
    }

    protected function handleError(Exception $e)
    {
        header("HTTP/1.0 500 Internal Server Error");
        $this->layout = 'error';
        parent::view('errors/500', ['error' => $e->getMessage()]);
    }

    protected function handleNotFound()
    {
        header("HTTP/1.0 404 Not Found");
        $this->layout = 'error';
        parent::view('errors/404');
    }
}
// example

// Using controller with nested prefix and layout
//$router = new Router();
//$router->controller(StaffController::class, function($router) {
//    $router->prefix('admin', function($router) {
//        $router->layouts('admin', function($router) {
//            // These routes will use StaffController automatically
//            $router->get('/staff', 'index');           // StaffController@index
//            $router->post('/staff', 'search');         // StaffController@search
//            $router->get('/staff/{id}', 'show');       // StaffController@show
//            $router->put('/staff/{id}', 'update');     // StaffController@update
//            $router->delete('/staff/{id}', 'delete');  // StaffController@delete
//        });
//    });
//});
//
//// Multiple controllers in same group
//$router->prefix('admin', function($router) {
//    $router->layouts('admin', function($router) {
//        // Staff routes
//        $router->controller(StaffController::class, function($router) {
//            $router->get('/staff', 'index');
//            $router->post('/staff', 'search');
//        });
//
//        // Department routes
//        $router->controller(DepartmentController::class, function($router) {
//            $router->get('/departments', 'index');
//            $router->post('/departments', 'store');
//        });
//    });
//});
//
//// Combined grouping
//$router->group([
//    'prefix' => 'api',
//    'layout' => false,
//    'controller' => ApiController::class
//], function($router) {
//    $router->get('/users', 'getUsers');
//    $router->post('/users', 'createUser');
//    $router->get('/users/{id}', 'getUser');
//});
//
//// Auth routes
//$router->controller(AuthController::class, function($router) {
//    $router->layouts('auth', function($router) {
//        $router->get('/login', 'showLogin');
//        $router->post('/login', 'login');
//        $router->get('/register', 'showRegister');
//        $router->post('/register', 'register');
//    });
//});
