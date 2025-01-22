<?php


require_once 'modele_favorites.php';
require_once 'vue_favorites.php';
require_once __DIR__  . '/../../connexion.php';


class ContFavorites{

    private $modele;
    private $vue;
    private $action;

    public function __construct(){
        $this->modele = new ModeleFavorites();
        $this->vue = new VueFavorites();
        $this->action = isset($_GET['action'])? $_GET['action'] : 'displayFavorites';
    }

    public function recupFavorites()
    {
        if (!isset($_SESSION['identifiant_utilisateur'])) {
            // Gérer l'erreur si l'utilisateur n'est pas connecté
            die('Utilisateur non connecté.');
        }

        $userId = $_SESSION['identifiant_utilisateur'];
        $favorites = $this->modele->recupFavorites($userId);

        // Formater les dates
        foreach ($favorites as &$ad) {
            $ad['formatted_start_date'] = $this->modele->formatDate($ad['lease_start']);
            $ad['formatted_end_date'] = $this->modele->formatDate($ad['lease_end']);
        }

        $this->vue->displayFavorites($favorites);
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