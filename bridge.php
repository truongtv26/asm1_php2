<?php

//http protocol
if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on")
    $http_protocol = 'https://' . $_SERVER['HTTP_HOST'];
else
    $http_protocol = 'http://' . $_SERVER['HTTP_HOST'];


$dir_root = $http_protocol . str_replace(
        strtolower($_SERVER['DOCUMENT_ROOT']),
        '',
        str_replace('\\', '/', strtolower(__DIR__)));

define('_DIR_ROOT_', $dir_root);

require_once "configs/routes.php";

require_once "core/Router.php";
require_once "app/App.php";
require_once "core/Controller.php";
require_once "core/Database.php";

require_once "core/Request.php";

