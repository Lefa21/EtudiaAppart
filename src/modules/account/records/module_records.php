<?php

include_once 'controller_records.php';

class ModuleRecords
{
    private $controller;

    public function __construct()
    {
        $this->controller = new ControllerRecords();

        switch ($this->controller->getAction()) {
            case 'monDossier':
                $this->controller->monDossier();
        }
    }

    public function displayContent()
    {
        return $this->controller->displayContent();
    }
}
