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
        $this->action = isset($_GET['action'])? $_GET['action'] : 'formulaireCreationAnnonce';
    }
    public function etapesCreation(){
        $this->vue->etapesCreation();
    }

    public function formulaireCreationAnnonce(){
        $this->vue->formulaireCreationAnnonce();
    }

    public function photosCreationAnnonce(){
        $this->vue->photosCreationAnnonce();
    }

    public function descriptionCreationAnnonce(){
        $this->vue->descriptionCreationAnnonce();
    }
    public function ajoutInfos(){
        $this->vue->ajoutInfos();
    }
    public function getAction(){
        return $this->action;
    }

    public function displayContent()
    {
        return $this->vue->getAffichage();
    }

}
