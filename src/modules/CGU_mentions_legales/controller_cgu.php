<?php

require_once 'vue_cgu.php';
require_once __DIR__  . '/../../connexion.php';

class ContCGU
{
    private $vue;
    private $action;
    public function __construct()
    {
        $this->vue = new VueCGU();
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'cgu';
    }

    public function cgu()
    {
        $this->vue->cgu();
    }
    public function getAction(){
        return $this->action;
    }
    public function displayContent()
    {
        return $this->vue->getAffichage();
    }
}