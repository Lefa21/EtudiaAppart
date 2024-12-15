<?php


require_once 'controller_connexion.php';

class ModInscription{
    private $controleur;
    public function __construct(){
        $this->controleur = new ContInscription();
        switch($this->controleur->getAction()){
            case 'inscription':
                $this->controleur->ajoutUtilisateur();
                break;

            case 'connexion': 
                $this->controleur->VerifConnexion();
                break;
            case 'deconnexion': 
                    $this->controleur->deconnexionUtilisateur();
                break;    
        }

    } 

    public function displayContent(){
       return  $this->controleur->displayContent();
    }
}
?>