<?php


require_once 'controller_favorites.php';

class ModFavorites{
    private $controleur;
    public function __construct(){
        $this->controleur = new ContFavorites();
        switch($this->controleur->getAction()){
            case 'displayFavorites':
                $this->controleur->recupFavorites();
                break;

        }

    } 

    public function displayContent(){
       return  $this->controleur->displayContent();
    }
}
?>