<?php

require_once 'controller_inscription.php';

class ModInscription
{
    private $controller;

    public function __construct()
    {
        $this->controller = new ContInscription();

        switch ($this->controller->getAction()) {
            case 'formulaireInscription':
                $this->controller->formulaireInscription();
                break;

            case 'inscription':
                $this->controller->ajoutUtilisateur();
                break;
        }
    }

    public function displayContent()
    {
        return $this->controller->displayContent();
    }
}
