<?php


require_once 'controller_student_requests.php';

class ModStudentRequests{
    private $controleur;
    public function __construct(){
        $this->controleur = new ContStudentRequests();
        $idUser = $_SESSION["identifiant_utilisateur"];
        switch($this->controleur->getAction()){
            case 'follow-up_student_requests':
                $this->controleur->followUpRequests($idUser);
                break;
        }

    } 

    public function displayContent(){
       return  $this->controleur->displayContent();
    }
}
?>