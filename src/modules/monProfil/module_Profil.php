<?php

include_once 'controller_Profil.php';
require_once 'modele_Profil.php';

class ModuleProfil
{
    private $controller;

    public function __construct()
    {
        $this->controller = new ControllerProfil();
        $emailIdentification = $_SESSION['email'] ?? null;
        switch ($this->controller->getAction()) {

            case 'Profil':
                if ($emailIdentification === null) {
                    header('Location: index.php?module=connexion&action=formulaireConnexion');
                    exit();
                } else {
                    $this->controller->profil($emailIdentification);
                }
                break;
        }
    }

    public function displayContent()
    {
        return $this->controller->displayContent();
    }
}
