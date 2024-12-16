<?php

include_once 'vue_records.php';

class ControllerRecords
{
    private $action;
    private $vue;

    public function __construct()
    {
        $this->action = $_GET['action'] ?? "welcome";
        $this->vue = new VueRecords();
    }

    public function getAction()
    {
        return $this->action;
    }

    public function welcome()
    {
        $this->vue->welcome();
    }

    public function displayContent()
    {
        return $this->vue->getAffichage();
    }
}
