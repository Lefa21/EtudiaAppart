<?php

require_once 'modele_inscription.php';
require_once 'vue_inscription.php';
require_once __DIR__  . '/../../connexion.php';

class ContInscription
{
    private $modele;
    private $vue;
    private $action;

    public function __construct()
    {
        $this->modele = new ModeleInscription();
        $this->vue = new VueInscription();
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'formulaireInscription';
    }

    public function ajoutUtilisateur()
    {
        $errors = $this->modele->ajoutUtilisateur();

        if (!empty($errors)) {
            $this->formulaireInscription($errors);
        }
    }
    public function signUpSuccess(){
        $this->vue->signUpSuccess();
    }

    public function confirmEmail(){
        $this->modele->confirmEmail();
    }
    public function registerSuccessful(){
        $this->vue->registerSuccessful();
    }

    public function formulaireInscription($errors = [])
    {
        $this->vue->formulaireInscription($errors);
    }
    
    public function getVue(){
        return $this->vue;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function displayContent()
    {
        return $this->vue->getAffichage();
    }
}
