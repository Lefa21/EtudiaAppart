<?php

include_once 'controller_Profil.php';

class ModuleProfil
{
    private $controller;

    public function __construct()
    {
        $this->controller = new ControllerProfil();

        switch ($this->controller->getAction()) {
            case 'Profil':
                $this->controller->profil();
        }
    }

    public function displayContent()
    {
        return $this->controller->displayContent();
    }
}