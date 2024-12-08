<?php


require_once 'modele_connexion.php';
require_once 'vue_connexion.php';
require_once __DIR__  . '/../../connexion.php';

class ContConnexion{

    private $modele;
    private $vue;
    private $action;

    public function __construct(){
        $this->modele = new ModeleConnexion();
        $this->vue = new VueConnexion();
        $this->action = isset($_GET['action'])? $_GET['action'] : 'formulaireConnexion';
    }

    public function formulaireConnexion(){  
        $this->vue->formulaireConnexion();
    }
    

    public function VerifConnexion(){
        $this->modele->connexionUtilisateur();
    }

    public function deconnexionUtilisateur(){
        $this->modele->deconnexionUtilisateur();
    }
    
    public function getAction(){
        return $this->action;
    }

    public function displayContent()
    {
        return $this->vue->getAffichage();
    }

}

?>