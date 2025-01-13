<?php


require_once 'modele_reset_password.php';
require_once 'vue_reset_password.php';
require_once __DIR__  . '/../../connexion.php';

class ContResetPassword{

    private $modele;
    private $vue;
    private $action;

    public function __construct(){
        $this->modele = new ModeleResetPassword();
        $this->vue = new VueResetPassword();
        $this->action = isset($_GET['action'])? $_GET['action'] : 'formulaireResetPassword';
    }

    public function formulaireResetPassword(){  
        $this->vue->formulaireResetPassword();
    }
    
    public function getAction(){
        return $this->action;
    }

    public function displayContent()
    {
        return $this->vue->getAffichage();
    }

}

?>