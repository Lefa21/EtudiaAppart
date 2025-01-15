<?php

require_once 'controller_cgu.php';

class ModCGU{
    private $controller;
    public function __construct(){
        $this->controller = new ContCGU();
        if ($this->controller->getAction() == 'cgu') {
            $this->controller->cgu();
        }
    }
    public function displayContent(){
        return  $this->controller->displayContent();
    }
}