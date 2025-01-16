<?php

include_once 'controller_annonce.php';

class ModuleAnnonce
{
    private $controller;

    public function __construct()
    {
        $this->controller = new ControllerAnnonce();

        switch ($this->controller->getAction()) {
            case 'annoncePage':
                $this->controller->annoncePage();
        }
    }

    public function displayContent()
    {
        return $this->controller->displayContent();
    }
}
