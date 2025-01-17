<?php


require_once 'modele_student_requests.php';
require_once 'vue_student_requests.php';
require_once __DIR__  . '/../../connexion.php';


class ContStudentRequests{

    private $modele;
    private $vue;
    private $action;

    public function __construct(){
        $this->modele = new ModeleStudentRequests();
        $this->vue = new VueStudentRequests();
        $this->action = isset($_GET['action'])? $_GET['action'] : 'follow-up_student_requests';
    }

    public function followUpRequests($idUser){  
        $requestData = $this->modele->getRequests($idUser);
        $this->vue->followUpRequests($requestData);
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