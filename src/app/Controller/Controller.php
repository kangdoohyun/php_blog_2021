<?php

namespace App\Controller;

use App\Application;

abstract class Controller
{
    private Application $application;

    public function __construct()
    {
        $this->application = Application::getInstance();
    }

    function getViewPath($viewName)
    {
        return __DIR__ . '/../../view/' . $viewName . '.php';
    }

    function getApplication(): Application
    {
        return $this->application;
    }
} 