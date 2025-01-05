<?php

require_once __DIR__  . '/../../connexion.php';

class ModeleCreationAnnonce extends Connexion
{
    public function __construct()
    {
    }
    public function ajoutInfos()
    {
//        && isset($_POST['meuble']) && isset($_POST['titre_form']) && isset($_POST['type_logement_form']) && isset($_POST['prix_form']) && isset($_POST['superficie_form']) && isset($_POST['nb_pieces_form']) && isset($_POST['debut_form']) && isset($_POST['fin_form'])
        if(isset($_POST['sub_info']) &&  isset($_POST['loc_form']) && isset($_POST['ville_form']) && isset($_POST['cp_form']) && isset($_POST['region_form'])) {
//            $titre_form = $_POST['titre_form'];
//            $type_logement_form = $_POST['type_logement_form'];
//            $prix_form = $_POST['prix_form'];
//            $meuble = $_POST['meuble'];
//            $superficie_form = $_POST['superficie_form'];
//            $nb_pieces_form = $_POST['nb_pieces_form'];
//            $debut_form = $_POST['debut_form'];
//            $fin_form = $_POST['fin_form'];
            $loc_form = $_POST['loc_form'];
            $ville_form = $_POST['ville_form'];
            $cp_form = $_POST['cp_form'];
            $region_form = $_POST['region_form'];
//            $sql1 = Connexion::getBdd()->prepare('INSERT INTO Ad (date_publication, rent_price, description, lease_start, lease_end, ad_title) VALUES (NOW(), :prix_form, :description, :debut_form, :fin_form, :titre_form)');
//            $sql1->bindParam(':prix_form', $prix_form);
//            $sql1->bindParam(':debut_form', $debut_form);
//            $sql1->bindParam(':fin_form', $fin_form);
//            $sql1->bindParam(':titre_form', $titre_form);
//            $sql1->bindParam(':description', '');
//            $sql2 = Connexion::getBdd()->prepare('INSERT INTO Habitation (numbers_rooms, furnished, type_habitation, surface_area) VALUES (:nb_pieces_form, :meuble, :type_logement_form, :superficie_form)');
//            $sql2->bindParam(':nb_pieces_form', $nb_pieces_form);
//            $sql2->bindParam(':meuble', $meuble);
//            $sql2->bindParam(':type_logement_form', $type_logement_form);
//            $sql2->bindParam(':superficie_form', $superficie_form);
            $sql3 = Connexion::getBdd()->prepare('INSERT INTO Address (address_line, city, zipcode, country) VALUES (:loc_form, :ville_form, :cp_form, :region_form)');
            $sql3->bindParam(':loc_form', $loc_form);
            $sql3->bindParam(':ville_form', $ville_form);
            $sql3->bindParam(':cp_form', $cp_form);
            $sql3->bindParam(':region_form', $region_form);
            if ($sql3->execute()) {
                header('index.php?module=creation_annonce&action=formulaireCreationAnnonce');
//                echo 'l\'annonce a bien été prise en compte' . '</br>';
            } else {
                echo 'Erreur lors de l\'inscription, veuillez réessayer plus tard.' . '</br>';
            }


        }
//        else { $sql1->execute() && $sql2->execute() &&
//            header('index.php?module=creation_annonce&action=formulaireCreationAnnonce');
//            echo '<script type="text/javascript">window.onload = function () { alert("Tous les champs doivent être remplis."); } </script>';
//        }

    }
    public function ajoutPhotos(){


    }

    public function ajoutDescription(){
        if (isset($POST['description'])) {
            $description = $_POST['description'];
            $sql = Connexion::getBdd()->prepare('INSERT INTO Ad (description) VALUES (:description)');
            $sql->bindParam(':description', $description);
        }
        else {
            echo 'Tous les champs doivent être remplis.' . '</br>';
        }
    }
}