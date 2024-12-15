<?php


require_once 'modele_inscription.php';
require_once 'vue_inscription.php';
require_once __DIR__  . '/../../connexion.php';


class ContInscription{

    private $modele;
    private $vue;
    private $action;

    public function __construct(){
        $this->modele = new ModeleInscription();
        $this->vue = new VueInscription();
        $this->action = isset($_GET['action'])? $_GET['action'] : 'formulaireInscription';
    }

    public function ajoutUtilisateur(){
        $this->modele->ajoutUtilisateur();
    }

    public function formulaireInscription(){  
        $this->vue->formulaireInscription();
    }
    

    public function VerifConnexion(){
        $this->modele->connexionUtilisateur();
    }

    public function deconnexionUtilisateur(){
        $this->modele->deconnexionUtilisateur();
    }

    public function getVue(){
        return $this->vue;
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