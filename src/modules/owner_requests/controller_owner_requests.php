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
        $this->action = isset($_GET['action'])? $_GET['action'] : 'follow-up_owner_requests';
    }

    public function followUpRequests($idUser){  
        $applyData = $this->modele->getApply($idUser);
        $this->vue->followUpRequests($applyData);
    }

    public function show_application(){  
        $applicationData = $this->modele->getApplication();
        $this->vue->show_application($applicationData);
    }

    public function validate_request(){  
        $this->modele->changeStatusRequest();
        $this->vue->showValidationMessage();
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