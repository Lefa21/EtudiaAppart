<?php


require_once 'modele_connexion.php';
require_once 'vue_connexion.php';
require_once __DIR__  . '/../../connexion.php';

class ContConnexion
{
    private $modele;
    private $vue;
    private $action;

    public function __construct()
    {
        $this->modele = new ModeleConnexion();
        $this->vue = new VueConnexion();
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'formulaireConnexion';
    }

    public function formulaireConnexion($errors = [])
    {
        $this->vue->formulaireConnexion($errors);
    }

    public function VerifConnexion()
    {
        $errors = $this->modele->connexionUtilisateur();

        if (empty($errors)) {
            $this->formulaireConnexion($errors);
        }
    }

    public function deconnexionUtilisateur()
    {
        $this->modele->deconnexionUtilisateur();
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

?>