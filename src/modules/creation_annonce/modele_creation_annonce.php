<?php

require_once __DIR__  . '/../../connexion.php';

class ModeleCreationAnnonce extends Connexion
{
    public function __construct()
    {
    }

    public function ajoutInfos()
    {
        if (isset($_POST['submit']) && isset($_POST['loc_form']) && isset($_POST['ville_form']) && isset($_POST['region_form'])  && isset($_POST['titre_form']) && isset($_POST['type_logement_form']) && isset($_POST['prix_form']) && isset($_POST['superficie_form']) && isset($_POST['nb_pieces_form']) && isset($_POST['debut_form']) && isset($_POST['fin_form'])) {
            if(!isset($_POST['meuble'])){
                $meuble = 0;
            }else{
                $meuble = 1;
            }

            $titre_form = $_POST['titre_form'];
            $type_logement_form = $_POST['type_logement_form'];
            $prix_form = $_POST['prix_form'];
            $superficie_form = $_POST['superficie_form'];
            $nb_pieces_form = $_POST['nb_pieces_form'];
            $debut_form = $_POST['debut_form'];
            $fin_form = $_POST['fin_form'];
            $loc_form = $_POST['loc_form'];
            $ville_form = $_POST['ville_form'];
            $region_form = $_POST['region_form'];
            $description =  $_POST['description'];
            $emailUser = $_SESSION['identifiant_utilisateur'];


            $sql1 = Connexion::getBdd()->prepare('SELECT id_user FROM User WHERE email = :email');
            $sql1->bindParam(':email', $emailUser);
            $sql1->execute();
            $idUser =  $sql1->fetch(PDO::FETCH_ASSOC);

            try {
                $sqlCheck = Connexion::getBdd()->prepare('
                SELECT id_address, country, city, address_line FROM Address 
                WHERE address_line = :loc_form AND city = :ville_form AND country = :region_form
            ');
                $sqlCheck->bindParam(':loc_form', $loc_form);
                $sqlCheck->bindParam(':ville_form', $ville_form);
                $sqlCheck->bindParam(':region_form', $region_form);
                $sqlCheck->execute();

                $existingAddress = $sqlCheck->fetch(PDO::FETCH_ASSOC);

                $addressId = 0;
                if ($existingAddress) {
                    $addressId = $existingAddress['id_address'];
                } else {
                    $sql3 = Connexion::getBdd()->prepare('
                    INSERT INTO Address (address_line, city, country) 
                    VALUES (:loc_form, :ville_form, :region_form)
                ');
                    $sql3->bindParam(':loc_form', $loc_form);
                    $sql3->bindParam(':ville_form', $ville_form);
                    $sql3->bindParam(':region_form', $region_form);

                    if ($sql3->execute()) {
                        $addressId = Connexion::getBdd()->lastInsertId();
                    } else {
                        echo "Erreur lors de l'insertion de l'adresse."; // page erreur 404
                    }
                }
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }

            $sql2 = Connexion::getBdd()->prepare('INSERT INTO Habitation (numbers_rooms, furnished, type_habitation, surface_area, id_address) VALUES (:nb_pieces_form, :meuble, :type_logement_form, :superficie_form, :addressId)');
            $sql2->bindParam(':nb_pieces_form', $nb_pieces_form);
            $sql2->bindParam(':meuble', $meuble);
            $sql2->bindParam(':type_logement_form', $type_logement_form);
            $sql2->bindParam(':superficie_form', $superficie_form);
            $sql2->bindParam(':addressId', $addressId);

            $HabitationId = 0;
            if ($sql2->execute()) {
                $HabitationId = Connexion::getBdd()->lastInsertId();
            }

            $sql4 = Connexion::getBdd()->prepare('INSERT INTO Ad (date_publication, rent_price, description, lease_start, lease_end, ad_title,id_habitation, id_user) VALUES (NOW(), :prix_form, :description, :debut_form, :fin_form, :titre_form, :HabitationId, :UserId)');
            $sql4->bindParam(':prix_form', $prix_form);
            $sql4->bindParam(':debut_form', $debut_form);
            $sql4->bindParam(':fin_form', $fin_form);
            $sql4->bindParam(':titre_form', $titre_form);
            $sql4->bindParam(':description', $description);
            $sql4->bindParam(':HabitationId', $HabitationId);
            $sql4->bindParam(':UserId', $idUser['id_user']);
            $sql4->execute();

            header('index.php?module=creation_annonce&action=formulaireCreationAnnonce');
        } else {
            echo '<script type="text/javascript">window.onload = function () { alert("Tous les champs doivent être remplis."); } </script>';
        }
    }

    public function ajoutPhotos(){


    }
}