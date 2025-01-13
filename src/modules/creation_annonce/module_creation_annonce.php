<?php


require_once 'controleur_creation_annonce.php';

class ModCreationAnnonce{
    private $controleur;
    public function __construct(){
        $this->controleur = new ContCreationAnnonce();
        //$this->controleur->etapesCreation();
        switch($this->controleur->getAction()){
            case 'formulaireCreationAnnonce':
                $this->controleur->formulaireCreationAnnonce();
                break;

            case 'photosCreationAnnonce':
                $this->controleur->photosCreationAnnonce();
                break;
            case 'descriptionCreationAnnonce':
                $this->controleur->descriptionCreationAnnonce();
                break;
        }

    }


    public function displayContent(){
        return  $this->controleur->displayContent();
    }
}