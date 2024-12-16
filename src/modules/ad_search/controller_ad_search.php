<?php


require_once 'modele_ad_search.php';
require_once 'vue_ad_search.php';
require_once __DIR__  . '/../../connexion.php';

class ContSearchAd{

    private $modele;
    private $vue;
    private $action;

    public function __construct(){
        $this->modele = new ModeleSearchAd();
        $this->vue = new VueSearchAd();
        $this->action = isset($_GET['action'])? $_GET['action'] : 'recherche_annonce';
    }

    public function showSearchAd(){  
        $this->vue->showSearchAd();
    }
    
    public function getAction(){
        return $this->action;
    }

    public function displayContent()
    {
        return $this->vue->getAffichage();
    }

}

?>