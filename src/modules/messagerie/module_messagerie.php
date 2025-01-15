<?php

require_once 'controller_messagerie.php';

class ModMessagerie{
    private $controller;
    public function __construct(){
        $user = $_SESSION['identifiant_utilisateur'];
        $this->controller = new ContMessagerie();
        switch ($this->controller->getAction()) {
            case 'messagerie':
                $this->controller->messagerie($user);
                break;
            case 'conversation':
                $this->controller->conversation($user);
                break;
            case 'envoyerMessage':
                $this->controller->envoyerMessage($user);
                break;
        }
    }

    public function displayContent(){
        return  $this->controller->displayContent();
    }
}