<?php


require_once 'controller_reports.php';


class ModReports{
    private $controleur;
    public function __construct(){
        $this->controleur = new ContReports();
        $isAdmin = isset($_SESSION["user_status"]) && $_SESSION["user_status"] === "admin";

        if($this->controleur->getAction() == "viewReports"){
                if(!$isAdmin){
                    header('Location: ./');
                    exit();
                }else{
                    $this->controleur->viewReports();
                }
        }

    }


    public function displayContent(){
        return  $this->controleur->displayContent();
    }
}