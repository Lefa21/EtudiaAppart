<?php


require_once 'controleur_creation_annonce.php';

class ModCreationAnnonce{
    private $controleur;
    public function __construct(){
        $this->controleur = new ContCreationAnnonce();
<<<<<<< HEAD
        
=======
>>>>>>> 8924398 (bonne version de dev si qqn a des problemes de versions)
        //$this->controleur->etapesCreation();
        switch($this->controleur->getAction()){
            case 'formulaireCreationAnnonce':
                if(!isset($_SESSION['identifiant_utilisateur'])){
                    header('Location: index.php?module=connexion&action=formulaireConnexion');
                    exit(); 
                }else{
                    $this->controleur->formulaireCreationAnnonce();
                }
                break;
            case 'ajoutInfos':
                $this->controleur->ajoutInfos();
                break;
        }

    }


    public function displayContent(){
        return  $this->controleur->displayContent();
    }
}