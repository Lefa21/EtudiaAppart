<?php


require_once 'controller_contact.php';

class ModContact{
    private $controleur;
    public function __construct(){
        $this->controleur = new ContContact();

        if($this->controleur->getAction() == "contact"){
                if(!isset($_SESSION['identifiant_utilisateur'])){
                    header('Location: index.php?module=connexion&action=formulaireConnexion');
                    exit();
                }else{
                    $this->controleur->contact();
                }
        }

    }


    public function displayContent(){
        return  $this->controleur->displayContent();
    }
}