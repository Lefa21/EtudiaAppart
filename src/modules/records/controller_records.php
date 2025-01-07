<?php

require_once 'modele_records.php';
require_once 'vue_records.php';

class ControllerRecords
{
    private $modele;
    private $vue;
    private $action;

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
