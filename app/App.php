<?php
use core\Router;
class App
{
    public string|object $controller;
    public string $action;
    public array $params;
    public object $router;
    public function __construct()
    {
        $this->router = new Router();

        $this->controller = 'Customer';
        $this->action = 'list_customer';
        $this->params = [];

        $this->handleURL();
    }

    public function handleURL() {
        $URL = array_values(
            array_filter(
                explode('/', $this->router->handleRoute($this->getURL()))
            )
        );

        $controllerClass = '\controllers\\';
        $controllerPath = 'app/controllers/';

        // Tìm kiếm controller theo url
        if (!empty($URL[0])) {
            foreach ($URL as $key => $value) {
                $controllerPath .= $value . '.php';
                if (file_exists($controllerPath)) {
                    require_once $controllerPath;
                    $controllerClass .= ucfirst($value);
                    unset($URL[$key]);
                    break;
                } else {
                    unset($URL[$key]);
                }
            }
        } else {
            $controllerClass .= ucfirst($this->controller);
            $controllerPath .= $this->controller . '.php';
            require_once $controllerPath;
        }

        if (class_exists($controllerClass)) {
            $this->controller = new $controllerClass();
        } else {
            $this->errors(404, 'mes 1');
        }

        if (!empty($URL[1])) {
            $this->action = $URL[1];
            unset($URL[1]);
        }


        $this->params = is_array($URL) ? array_values($URL) : [];

        if (method_exists($this->controller, $this->action)) {
            call_user_func_array([$this->controller, $this->action], $this->params);
        } else {
            $this->errors(404, 'mes 2');
        }
    }

    public function getURL() {
        return !empty($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/';
    }

    public function errors($type = 404, $message) {
        require_once "app/views/errors/" . $type . '.php';
    }

}