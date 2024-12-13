<?php
require_once './src/connexion.php';
require_once './src/vue_generique.php';

session_start();

Connexion::initConnexion();

// permet de récuperer le module choisi par l'utilisateur
$module = $_GET["module"] ?? "home";
$moduleClass = "";
$moduleFile = "";

switch ($module) {
    case "home":
        $moduleFile = "./src/modules/home/module_home.php";
        $moduleClass = "ModuleHome";
        break;

    case "connexion":
        $moduleFile = "./src/modules/connexion/module_connexion.php";
        $moduleClass = "ModConnexion";
        break;

    case "inscription":
        $moduleFile = "./src/modules/inscription/module_inscription.php";
        $moduleClass = "ModInscription";
        break;

    case 'annonce':
        $moduleFile = './src/modules/annonce_student/module_annonce_student.php';
        $moduleClass = 'ModuleAnnonceStudent';
        break;

    case 'account/records':
        $moduleFile = './src/modules/account/records.php';
        $moduleClass = 'ModuleRecords';
        break;
}

if (file_exists($moduleFile)) {
    require $moduleFile;
    $moduleClass = new $moduleClass();
} else {
    var_dump($moduleFile);
    var_dump($moduleClass);
    echo "Erreur sur le module dans l'index";
}

$tampon = $moduleClass->displayContent();

include_once "./src/template.php";
