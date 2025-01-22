<?php


require_once 'modele_reset_password.php';
require_once 'vue_reset_password.php';
require_once __DIR__  . '/../../connexion.php';

class ContResetPassword{

    private $modele;
    private $vue;
    private $action;

    public function __construct()
    {
        $this->modele = new ModeleResetPassword();
        $this->vue = new VueResetPassword();
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'formulaireResetPassword';
    }

    public function formulaireResetPassword()
    {
        $this->vue->formulaireResetPassword();
    }

    public function formulaireNouveauPassword()
    {
        $result = $this->modele->resetPassword();
        $token = $result['token'] ?? null;
        $message = $result['message'] ?? null;
        $this->vue->formulaireNouveauPassword($token, $message);
    }

    public function sendPasswordReset()
    {
        $this->modele->sendPasswordReset();
    }
    public function verifierEtModifierMotDePasse()
    {
        $this->modele->verifierEtModifierMotDePasse();
    }

    public function resetPassword()
    {
        $this->formulaireNouveauPassword();
    }

    public function getAction()
    {
        return $this->action;
    }

    public function displayContent()
    {
        return $this->vue->getAffichage();
    }
}
