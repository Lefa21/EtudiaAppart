<?php


require_once 'controller_ad_search.php';

class ModSearchAd{
    private $controleur;
    public function __construct(){
        $this->controleur = new ContSearchAd();
        switch($this->controleur->getAction()){
            case 'recherche_annonce':
                $this->controleur->getAd();
                break; 
        }

    } 

    public function displayContent(){
       return  $this->controleur->displayContent();
    }
}
?>