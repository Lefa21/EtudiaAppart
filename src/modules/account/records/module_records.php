<?php

include_once 'controller_records.php';

class ModuleRecords
{
    private $controller;

    public function __construct()
    {
        $this->controller = new ControllerRecords();

        switch ($this->controller->getAction()) {
            case 'saveFiles':
                $this->controller->saveFiles();
                break;

            case 'saveEco':
                $this->controller->saveEco();
                break;

            case 'saveInfo':
                $this->controller->saveInfo();
                break;
        }
    }

    public function displayContent()
    {
        return $this->controller->displayContent();
    }
}
