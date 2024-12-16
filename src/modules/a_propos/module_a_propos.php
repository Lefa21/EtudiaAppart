<?php


require_once 'controller_a_propos.php';

class ModAPropos{
    private $controleur;
    public function __construct(){
        $this->controleur = new ContAPropos();
        switch($this->controleur->getAction()){
            case 'a_propos':
                $this->controleur->APropos();
                break;

        }

    } 

    public function displayContent(){
       return  $this->controleur->displayContent();
    }
}
?>