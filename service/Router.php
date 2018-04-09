<?php

namespace service;

class Router
{

    private $request_uri;
    private $match;

    public function __construct($request_uri, $match)
    {
        $this->request_uri = substr($request_uri, strpos($request_uri, "=") + 1);
        $this->match = $match;
    }

    /**
     * Return the controller and its action given the request_uri
     */
    public function resolve()
    {
        foreach ($this->match as $pattern => $controllerAction) {

            if (preg_match($pattern, $this->request_uri, $matches)) {

                $params = [];
                foreach ($matches as $key => $value) {

                    if ($key > 0) {
                        $params[] = $value;
                    }
                    if ($_POST) {
                        foreach ($_POST as $key => $value) {
                            $params[] = $value;
                        }
                    }


                    }

                    return [
                        'getController' => $this->match[$pattern]['getController'],
                        'action' => $this->match[$pattern]['action'],
                        'params' => $params,
                    ];
                }
            }
        }
    }