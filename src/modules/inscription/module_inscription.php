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
            case 'registerSuccessful': 
                $this->controleur->registerSuccessful();
                break;

            case 'signUpSuccess': 
                    $this->controleur->signUpSuccess();
                    break;    

            case 'confirmEmail': 
                $this->controleur->confirmEmail();
                break;
            case 'registerSuccessful': 
                $this->controleur->registerSuccessful();
                break;
        }
    }

    public function displayContent()
    {
        return $this->controller->displayContent();
    }
}
