<?php

include_once 'vue_records.php';

class ControllerRecords
{
    private $action;
    private $vue;

    public function __construct()
    {
        $this->action = $_GET['action'] ?? "monDossier";
        $this->vue = new VueRecords();
    }

    public function getAction()
    {
        return $this->action;
    }

    public function monDossier()
    {
        $this->vue->monDossier();
    }

    public function displayContent()
    {
        return $this->vue->getAffichage();
    }
}
