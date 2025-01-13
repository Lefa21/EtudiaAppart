<?php

require_once 'modele_messagerie.php';
require_once 'vue_messagerie.php';
require_once __DIR__  . '/../../connexion.php';

class ContMessagerie
{
    private $modele;
    private $vue;
    private $action;
    private $user;

    public function __construct()
    {
        $this->vue = new VueMessagerie();
        $this->modele = new ModeleMessagerie();
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'messagerie';

    }

    public function messagerie($user)
    {
        $data = $this->modele->getMessagerie($user);
        $this->vue->messagerie($data);
    }

    public function conversation($user, $id_sender)
    {
        $data = $this->modele->getConv($user);
        $this->vue->conversation($data, $id_sender);
    }
    public function envoyerMessage()
    {
        $this->modele->envoyerMessage();
    }






    public function getAction(){
        return $this->action;
    }
    public function displayContent()
    {
        return $this->vue->getAffichage();
    }
}