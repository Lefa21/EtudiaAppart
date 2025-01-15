<?php

require_once 'controller_faq.php';

class Modfaq{
    private $controller;
    public function __construct(){
        $this->controller = new Contfaq();
        if ($this->controller->getAction() == 'faq') {
            $this->controller->faq();
        }
    }
    public function displayContent(){
        return  $this->controller->displayContent();
    }
}