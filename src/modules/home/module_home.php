<?php

include_once 'controller_home.php';

class ModuleHome
{
    private $controller;

    public function __construct()
    {
        $this->controller = new ControllerHome();

        switch ($this->controller->getAction()) {
            case 'welcome':
                $this->controller->welcome();
                break;
            case 'bonsPlans':
                $this->controller->bonsPlans();
                break;
            case 'restauration':
                $this->controller->restauration();
                break;
            case 'events':
                $this->controller->events();
                break;
        }
    }

    public function displayContent()
    {
        return $this->controller->displayContent();
    }
}
