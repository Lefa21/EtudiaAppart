<?php

include_once 'controller_annonce.php';

class ModuleAnnonce
{
    private $controller;

    public function __construct()
    {
        $this->controller = new ControllerAnnonce();

        switch ($this->controller->getAction()) {
            case 'annoncePage':
                if (isset($_GET['id_ad'])) {
                    $annonceId = htmlspecialchars($_GET['id_ad']); // Sanitize the input

                    // Perform actions with the $idAd, like querying the database
                } else {
                    echo "No Ad ID provided!";
                }
                $this->controller->annoncePage($annonceId);
        }
    }

    public function displayContent()
    {
        return $this->controller->displayContent();
    }
}
