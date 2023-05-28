<?php

namespace core;

class Router
{
    private array $routes;

    public function __construct()
    {
        global $routes;
        $this->routes = $routes;
    }

    public function handleRoute($route) {
        $route = trim($route, '/');
        $finalRoute = '';
        foreach ($this->routes as $fake => $real) {
            if (preg_match("~^$fake~", $route)) {
                $finalRoute = preg_replace("~^$fake~", $real, $route);
            }
        }
        if ($finalRoute)
            return $finalRoute;
        return $route;
    }
}