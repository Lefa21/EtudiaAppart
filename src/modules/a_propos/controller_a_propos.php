<?php


require_once 'modele_a_propos.php';
require_once 'vue_a_propos.php';
require_once __DIR__  . '/../../connexion.php';


class ContAPropos{

    private $modele;
    private $vue;
    private $action;

    public function __construct(){
        $this->modele = new ModeleAPropos();
        $this->vue = new VueAPropos();
        $this->action = isset($_GET['action'])? $_GET['action'] : 'a_propos';
    }


    public function APropos(){  
        $this->vue->APropos();
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