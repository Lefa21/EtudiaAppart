<?php


require_once 'controller_inscription.php';

class ModInscription{
    private $controleur;
    public function __construct(){
        $this->controleur = new ContInscription();
        switch($this->controleur->getAction()){
            case 'formulaireInscription':
                $this->controleur->formulaireInscription();
                break;

            case 'inscription': 
                $this->controleur->ajoutUtilisateur();
                break;
        }

    } 

    public function displayContent(){
       return  $this->controleur->displayContent();
    }
}
?>