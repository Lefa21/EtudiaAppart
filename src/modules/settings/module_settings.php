<?php

require_once 'controller_settings.php';

class ModSettings{
    private $controller;
    public function __construct(){
        $user = $_SESSION['identifiant_utilisateur'];
        $this->controller = new ContSettings();
        switch ($this->controller->getAction()) {
            case 'showSettingsPage':
                $this->controller->showSettingsPage();
                break;
        }
    }

    public function displayContent(){
        return  $this->controller->displayContent();
    }
}