<?php

require_once 'controller_faq.php';

class ModFaq{
    private $controller;
    public function __construct(){
        $this->controller = new ContFaq();
        if ($this->controller->getAction() == 'faq') {
            $this->controller->faq();
        }
    }
    public function displayContent(){
        return  $this->controller->displayContent();
    }
}