<?php

require_once 'vue_faq.php';
require_once __DIR__  . '/../../connexion.php';

class Contfaq
{
    private $vue;
    private $action;
    public function __construct()
    {
        $this->vue = new Vuefaq();
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'faq';
    }

    public function faq()
    {
        $this->vue->faq();
    }
    public function getAction(){
        return $this->action;
    }
    public function displayContent()
    {
        return $this->vue->getAffichage();
    }
}