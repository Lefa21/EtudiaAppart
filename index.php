<?php
require_once './src/connexion.php';
require_once './src/vue_generique.php';



session_start();
require_once __DIR__ . '/src/modules/settings/modele_settings.php';

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

    case 'records':
        $moduleFile = './src/modules/account/records/module_records.php';
        $moduleClass = 'ModuleRecords';
        break;

    case 'owner_requests':
        $moduleFile = './src/modules/owner_requests/module_owner_requests.php';
        $moduleClass = 'ModOwnerRequests';
        break;
    
    case 'student_requests':
        $moduleFile = './src/modules/student_requests/module_student_requests.php';
        $moduleClass = 'ModStudentRequests';
        break;

    case 'ad_search':
        $moduleFile = './src/modules/ad_search/module_ad_search.php';
        $moduleClass = 'ModSearchAd';
        break;

    case 'monProfil':
        $moduleFile = './src/modules/monProfil/module_Profil.php';
        $moduleClass = 'ModuleProfil';
        break;
    case 'creation_annonce':
        $moduleFile = './src/modules/creation_annonce/module_creation_annonce.php';
        $moduleClass = 'ModCreationAnnonce';
        break;
    case 'messagerie':
        $moduleFile = './src/modules/messagerie/module_messagerie.php';
        $moduleClass = 'ModMessagerie';
        break;

    case 'resetPassword':
        $moduleFile = './src/modules/reset_password/module_reset_password.php';
        $moduleClass = 'ModResetPassword';
        break;
    case 'settings':
        $moduleFile = './src/modules/settings/module_settings.php';
        $moduleClass = 'ModSettings';
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
