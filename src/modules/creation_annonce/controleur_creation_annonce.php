<?php


require_once 'modele_creation_annonce.php';
require_once 'vue_creation_annonce.php';
require_once __DIR__  . '/../../connexion.php';


class ContCreationAnnonce{
    private $modele;
    private $vue;
    private $action;


    public function __construct()
    {
        $this->vue = new VueCreationAnnonce();
        $this->modele = new ModeleCreationAnnonce();
        $this->action = isset($_GET['action'])? $_GET['action'] : 'formulaireCreationAnnonce';
    }



    public function formulaireCreationAnnonce(){
        $this->vue->formulaireCreationAnnonce();
    }


    public function ajoutInfos(){
        $this->modele->ajoutInfos();
    }

    public function getAction(){
        return $this->action;
    }

    public function displayContent()
    {
        return $this->vue->getAffichage();
    }

}
