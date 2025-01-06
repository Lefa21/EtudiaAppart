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

    public function saveFiles()
    {
        $this->modele->saveFiles();
    }

    public function saveEco()
    {
        $this->modele->saveEco();
    }

    public function saveInfo()
    {
        $this->modele->saveInfo();
    }

    public function displayContent()
    {
        return $this->vue->getAffichage();
    }
}
