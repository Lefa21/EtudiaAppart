<?php


require_once 'modele_contact.php';
require_once 'vue_contact.php';
require_once __DIR__  . '/../../connexion.php';


class ContContact{
    private $modele;
    private $vue;
    private $action;


    public function __construct()
    {
        $this->vue = new VueContact();
        $this->modele = new ModeleContact();
        $this->action = isset($_GET['action'])? $_GET['action'] : 'contact';
    }



    public function contact(){
        $this->modele->contact();
        $this->vue->formulaireContact();
    }

    public function getAction(){
        return $this->action;
    }

    public function displayContent()
    {
        return $this->vue->getAffichage();
    }

}
