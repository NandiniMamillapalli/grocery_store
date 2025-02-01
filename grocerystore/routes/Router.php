<?php
class Router {
    private $routes = [];
    private $notFoundCallback;

    public function get($path, $callback) {
        $this->routes['GET'][$path] = $callback;
    }

    public function post($path, $callback) {
        $this->routes['POST'][$path] = $callback;
    }

    public function notFound($callback) {
        $this->notFoundCallback = $callback;
    }

    public function handleRequest() {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        
        // Remove base path if exists
        $basePath = dirname($_SERVER['SCRIPT_NAME']);
        if ($basePath !== '/') {
            $path = substr($path, strlen($basePath));
        }
        
        if (isset($this->routes[$method][$path])) {
            $callback = $this->routes[$method][$path];
            if (is_callable($callback)) {
                call_user_func($callback);
            } else if (is_array($callback)) {
                $controller = new $callback[0]();
                $method = $callback[1];
                $controller->$method();
            }
        } else {
            if ($this->notFoundCallback) {
                call_user_func($this->notFoundCallback);
            } else {
                header("HTTP/1.0 404 Not Found");
                echo "404 Not Found";
            }
        }
    }
}
?>
