<?php


require_once 'modele_owner_requests.php';
require_once 'vue_owner_requests.php';
require_once __DIR__  . '/../../connexion.php';


class ContOwnerRequests{

    private $modele;
    private $vue;
    private $action;

    public function __construct(){
        $this->modele = new ModeleOwnerRequests();
        $this->vue = new VueOwnerRequests();
        $this->action = isset($_GET['action'])? $_GET['action'] : 'follow-up_requests';
    }

    public function followUpRequests(){  
        $this->vue->followUpRequests();
    }

    public function show_application(){  
        $this->vue->show_application();
    }

    public function getVue(){
        return $this->vue;
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