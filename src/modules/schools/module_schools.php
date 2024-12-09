<?php

include_once 'controller_schools.php';

class ModuleSchools
{
    private $controller;

    public function __construct()
    {
        $this->controller = new ControllerSchools();

        switch ($this->controller->getAction()) {
            case 'schools':
                $this->controller->schools();
        }
    }

    public function displayContent()
    {
        return $this->controller->displayContent();
    }
}