<?php
require_once 'connexion.php';
require_once 'vue_generique.php';

session_start();

Connexion::initConnexion();

// permet de récuperer le module choisi par l'utilisateur
$module = $_GET['module'] ?? 'home';

$moduleClass = '';
$moduleFile = '';

switch ($module) {
    case 'home':
        $moduleFile = './modules/home/module_home.php';
        $moduleClass = 'ModuleHome';
        break;
    case 'connexion':
        $moduleFile = './modules/connexion/module_connexion.php';
        $moduleClass = 'ModConnexion';
        break;
    case 'annonce':
        $moduleFile = './modules/annonce_student/module_annonce_student.php';
        $moduleClass = 'ModuleAnnonceStudent';
        break;
    case 'account/records':
        $moduleFile = './modules/account/records.php';
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

include_once 'template.php';