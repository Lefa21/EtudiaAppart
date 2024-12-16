<?php

include_once 'controller_annonce_student.php';

class ModuleAnnonceStudent
{
    private $controller;

    public function __construct()
    {
        $this->controller = new ControllerAnnonceStudent();

        switch ($this->controller->getAction()) {
            case 'welcome':
                $this->controller->welcome();
        }
    }

    public function displayContent()
    {
        return $this->controller->displayContent();
    }
}