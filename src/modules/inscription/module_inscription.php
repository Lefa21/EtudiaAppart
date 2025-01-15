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

            case 'signUpSuccess': 
                    $this->controleur->signUpSuccess();
                    break;    

            case 'confirmEmail': 
                $this->controleur->confirmEmail();
                break;
        }

    } 

    public function displayContent(){
       return  $this->controleur->displayContent();
    }
}
?>