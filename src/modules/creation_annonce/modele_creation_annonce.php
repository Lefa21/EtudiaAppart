<?php

require_once __DIR__  . '/../../connexion.php';

class ModeleCreationAnnonce extends Connexion
{
    public function __construct()
    {
    }
    public function ajoutInfos()
    {
        if(isset($_POST['titre_form']) && isset($_POST['type_logement_form']) && isset($_POST['prix_form']) && isset($_POST['superficie_form']) && isset($_POST['nb_pieces_form']) && isset($_POST['debut_form']) && isset($_POST['fin_form']) && isset($_POST['loc_form']) && isset($_POST['ville_form']) && isset($_POST['cp_form']) && isset($_POST['region_form']))
        {
            $titre_form = $_POST['titre_form'];
            $type_logement_form = $_POST['type_logement_form'];
            $prix_form = $_POST['prix_form'];
            $meuble = $_POST['meuble'];
            $superficie_form = $_POST['superficie_form'];
            $nb_pieces_form = $_POST['nb_pieces_form'];
            $debut_form = $_POST['debut_form'];
            $fin_form = $_POST['fin_form'];
            $loc_form = $_POST['loc_form'];
            $ville_form = $_POST['ville_form'];
            $cp_form = $_POST['cp_form'];
            $region_form = $_POST['region_form'];
            $sql = Connexion::getBdd()->prepare('INSERT INTO Ad (rent_price, lease_start, lease_end, ad_title) VALUES (:prix_form, :debut_form, :$fin_form, :titre_form)');
            $sql->bindParam(':prix_form', $prix_form);
            $sql->bindParam(':debut_form', $debut_form);
            $sql->bindParam(':fin_form', $fin_form);
            $sql->bindParam(':titre_form', $titre_form);
            $sql->execute();
            $sql = Connexion::getBdd()->prepare('INSERT INTO Habitation (numbers_rooms, furnished, type_habitation, surface_area) VALUES (:nb_pieces_form, :meuble, :type_logement_form, :superficie_form)');
            $sql->bindParam(':nb_pieces_form', $nb_pieces_form);
            $sql->bindParam(':meuble', $meuble);
            $sql->bindParam(':type_logement_form', $type_logement_form);
            $sql->bindParam(':superficie_form', $superficie_form);
            $sql->execute();
            $sql = Connexion::getBdd()->prepare('INSERT INTO Address (address_line, city, zipcode, country) VALUES (:loc_form, :ville_form, :cp_form, :region_form)');
            $sql->bindParam(':loc_form', $loc_form);
            $sql->bindParam(':ville_form', $ville_form);
            $sql->bindParam(':cp_form', $cp_form);
            $sql->bindParam(':region_form', $region_form);
            $sql->execute();
            header('Location: index.php?module=creation_annonce&action=photosCreationAnnonce');
        }
        if (isset($POST['form_description']))
        {
            $form_description = $_POST['form_description'];
            $sql = Connexion::getBdd()->prepare('INSERT INTO Ad (description) VALUES (:form_description)');
            $sql->bindParam(':form_description', $form_description);
        }
    }
}
