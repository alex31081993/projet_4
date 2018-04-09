<?php
ini_set('display_errors', 1);
session_start();
require "autoload/Autoload.php";
\autoload\Autoload::register();

include_once 'config/routes.php';

try {

    $container = new \service\Container();

    $router = new \service\Router($_SERVER['REQUEST_URI'], $match);
    $resolve = $router->resolve();

    $getController = $resolve['getController'];
    $action = $resolve['action'];

    $controller = $container->$getController();
    call_user_func_array([$controller, $action], $resolve['params']);

} catch (Exception $e) {

    echo $e->getMessage();
}

