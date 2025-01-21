<?php


require_once 'controller_owner_requests.php';

class ModOwnerRequests{
    private $controleur;
    public function __construct(){
        $this->controleur = new ContOwnerRequests();
        $idUser = $_SESSION["identifiant_utilisateur"];
        switch($this->controleur->getAction()){
            case 'follow-up_owner_requests':
                $this->controleur->followUpRequests($idUser);
                break;

            case 'manage_application':
                $this->controleur->show_application();
                break;

            case 'validate_request':
                $this->controleur->validate_request();
                break;
        }

    } 

    public function displayContent(){
       return  $this->controleur->displayContent();
    }
}
?>