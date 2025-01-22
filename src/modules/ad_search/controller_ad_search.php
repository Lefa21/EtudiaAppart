<?php


require_once 'modele_ad_search.php';
require_once 'vue_ad_search.php';
require_once __DIR__  . '/../../connexion.php';

class ContSearchAd
{

    private $modele;
    private $vue;
    private $action;

    public function __construct()
    {
        $this->modele = new ModeleSearchAd();
        $this->vue = new VueSearchAd();
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'recherche_annonce';
    }

    public function getAd()
    {
        $adData = $this->modele->getAd();
        $this->vue->showSearchAd($adData);
    }

    public function searchAdTitles()
    {

        if (isset($_GET['keyword'])) {
            $keyword = trim($_GET['keyword']);


            if (!empty($keyword)) {
                $results = $this->modele->searchAdTitles($keyword);
                header('Content-Type: application/json');
                echo json_encode($results);
                exit;
            }
        }

        header('Content-Type: application/json');
        echo json_encode([]);
        exit;
    }

    public function addFavorite()
    {
        var_dump("on y est");
        if ($this->action === 'addFavorite' && isset($_GET['id_ad']) && isset($_SESSION['identifiant_utilisateur'])) {
            
            $adId = $_GET['id_ad'];
            $userId = $_SESSION['identifiant_utilisateur'];
            $this->modele->insertFavorite($userId, $adId);
        }

        $this->getAd();
        
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
