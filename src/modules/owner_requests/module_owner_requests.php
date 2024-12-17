<?php


require_once 'controller_owner_requests.php';

class ModOwnerRequests{
    private $controleur;
    public function __construct(){
        $this->controleur = new ContOwnerRequests();
        switch($this->controleur->getAction()){
            case 'follow-up_owner_requests':
                $this->controleur->followUpRequests();
                break;

            case 'manage_application':
                $this->controleur->show_application();
                break;

        }

    } 

    public function displayContent(){
       return  $this->controleur->displayContent();
    }
}
?>