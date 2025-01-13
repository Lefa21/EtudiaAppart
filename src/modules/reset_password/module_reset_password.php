<?php


require_once 'controller_reset_password.php';

class ModResetPassword{
    private $controleur;
    public function __construct(){
        $this->controleur = new ContResetPassword();
        switch($this->controleur->getAction()){
            case 'formulaireResetPassword': 
                $this->controleur->formulaireResetPassword();
                break;
        }

    } 

    public function displayContent(){
       return  $this->controleur->displayContent();
    }
}
?>