<?php

include_once 'vue_records.php';
include_once 'modele_records.php';

class ControllerRecords
{
    private $modele;
    private $action;
    private $vue;

    public function __construct()
    {
        $this->action = $_GET['action'] ?? "monDossier";
        $this->modele = new ModeleRecords();
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

    public function saveFiles()
    {
        $this->modele->saveFiles();
    }

    public function displayContent()
    {
        return $this->vue->getAffichage();
    }
}
