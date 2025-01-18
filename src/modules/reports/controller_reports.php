<?php


require_once 'modele_reports.php';
require_once 'vue_reports.php';
require_once __DIR__  . '/../../connexion.php';


class ContReports{
    private $modele;
    private $vue;
    private $action;


    public function __construct()
    {
        $this->vue = new VueReports();
        $this->modele = new ModeleReports();
        $this->action = isset($_GET['action'])? $_GET['action'] : 'viewReports';
    }

    public function viewReports(){
        $results = $this->modele->getReports();
        $this->vue->viewReports($results);
    }


    public function getAction(){
        return $this->action;
    }

    public function displayContent()
    {
        return $this->vue->getAffichage();
    }

}
