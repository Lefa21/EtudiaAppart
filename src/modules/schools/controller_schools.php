<?php

include_once 'vue_schools.php';

class ControllerSchools
{
    private $action;
    private $vue;

    public function __construct()
    {
        $this->action = $_GET['action'] ?? "schools";
        $this->vue = new VueSchools();
    }

    public function getAction()
    {
        return $this->action;
    }

    public function schools()
    {
        $this->vue->schools();
    }

    public function displayContent()
    {
        return $this->vue->getAffichage();
    }
}