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
        $moduleFile = './src/modules/annonce/module_annonce.php';
        $moduleClass = 'ModuleAnnonce';
        break;

    case 'records':
        $moduleFile = './src/modules/records/module_records.php';
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
    case 'a_propos':
        $moduleFile = './src/modules/a_propos/module_a_propos.php';
        $moduleClass = 'ModAPropos';
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
    case 'favorites':
        $moduleFile = './src/modules/favorites/module_favorites.php';
        $moduleClass = 'ModFavorites';
        break;
    case 'schools':
        $moduleFile = './src/modules/schools/module_schools.php';
        $moduleClass = 'ModuleSchools';
        break;
    case 'cgu':
        $moduleFile = './src/modules/CGU_mentions_legales/module_cgu.php';
        $moduleClass = 'ModCGU';
        break;
    case 'contact':
        $moduleFile = './src/modules/contact/module_contact.php';
        $moduleClass = 'ModContact';
        break;
    case 'reports':
        $moduleFile = './src/modules/reports/module_reports.php';
        $moduleClass = 'ModReports';
        break;
    case 'faq':
        $moduleFile = './src/modules/faq/module_faq.php';
        $moduleClass = 'ModFaq';
        break;
}


unset($_SESSION['json_response']);
if (file_exists($moduleFile)) {
    require $moduleFile;
    $moduleClass = new $moduleClass();

    $tampon = $moduleClass->displayContent();
}

if (!isset($_SESSION['json_response'])) {
    require_once "./src/template.php";
} else {
    unset($_SESSION['json_response']);
    echo $tampon;
}
