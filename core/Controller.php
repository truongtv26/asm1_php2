<?php

namespace core;


class Controller
{
    public $data;

    public function model($model) {
        $modelPath = 'app/models/' . ucfirst($model) . '.php';
        if (file_exists($modelPath)) {
            $modelClass = '\models\\' . ucfirst($model);
            require_once $modelPath;
            if (class_exists($modelClass)) {
                return new $modelClass();
            }
        }
        return false;
    }

    public function render($target, $data = []) {
        extract($data);

        if (file_exists('app/views/' . $target . '.php'))
            require_once 'app/views/' . $target . '.php';
    }
}