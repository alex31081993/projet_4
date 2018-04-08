<?php

namespace controller;


abstract class Controller
{
    public function render($view_file, array $params)
    {
        extract($params);
        require($view_file);
    }

    public function redirct($url)
    {
        header('Location: ' . $url);
    }
}