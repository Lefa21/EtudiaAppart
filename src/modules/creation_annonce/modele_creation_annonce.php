<?php

require_once __DIR__  . '/../../connexion.php';

class ModeleCreationAnnonce extends Connexion
{
    public function __construct()
    {
    }
    public function ajoutInfos()
    {
        if (isset($_POST['submit_button'], $_POST['zipcode_form'], $_POST['loc_form'], $_POST['ville_form'], $_POST['region_form'], $_POST['titre_form'], $_POST['type_logement_form'], $_POST['prix_form'], $_POST['superficie_form'], $_POST['nb_pieces_form'], $_POST['debut_form'], $_POST['fin_form'], $_POST['description'], $_FILES['input_photo1'])) {
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
            $zipcode = $_POST['zipcode_form'];
            $region_form = $_POST['region_form'];
            $imageName1 = $_FILES['input_photo1']['name'];
            $imageTmpName1 = $_FILES['input_photo1']['tmp_name'];
            $imageSize1 = $_FILES['input_photo1']['size'];
            $imageType1 = $_FILES['input_photo1']['type'];
            $description =  $_POST['description'];
            $emailUser = $_SESSION['email'];
//            $latitude = isset($_POST['latitude']) ? round((float)$_POST['latitude'], 6) : null;
//            $longitude = isset($_POST['longitude']) ? round((float)$_POST['longitude'], 6) : null;


            $sql1 = Connexion::getBdd()->prepare('SELECT id_user FROM User WHERE email = :email');
            $sql1->bindParam(':email', $emailUser);
            $sql1->execute();
            $idUser =  $sql1->fetch(PDO::FETCH_ASSOC);

            try{
                $sqlCheck = Connexion::getBdd()->prepare('
                SELECT a.id_address
                FROM Address a
                WHERE a.country=:region_form AND a.city=:ville_form AND a.address_line=:loc_form AND a.zipCode=:zipcode
            ');;
                $sqlCheck->bindParam(':region_form', $region_form);
                $sqlCheck->bindParam(':ville_form', $ville_form);
                $sqlCheck->bindParam(':loc_form', $loc_form);
                $sqlCheck->bindParam(':zipcode', $zipcode);
                $sqlCheck->execute();

                $existingHabitation = $sqlCheck->fetch(PDO::FETCH_ASSOC);
                $addressId = $existingHabitation;

                if (!$existingHabitation) {
                    $sql3 = Connexion::getBdd()->prepare('
                    INSERT INTO Address (address_line, city, country, zipCode) 
                    VALUES (:loc_form, :ville_form, :region_form, :zipcode)
                    ');
                    $sql3->bindParam(':loc_form', $loc_form);
                    $sql3->bindParam(':ville_form', $ville_form);
                    $sql3->bindParam(':region_form', $region_form);
                    $sql3->bindParam(':zipcode', $zipcode);
                    if ($sql3->execute()) {
                        $addressId = Connexion::getBdd()->lastInsertId();
                    } else {
                        echo "Erreur lors de l'insertion de l'adresse."; // page erreur 404
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

                    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

                    if ($imageSize1 > 5000000) { // Limite à 5 Mo
                        echo '<script>alert("La taille de l\'image 1 est trop grande.")</script>';

                    }
                    if (!in_array($imageType1, $allowedTypes)) {
                        echo '<script>alert("Le type de fichier de l\'image 1 n\'est pas autorisé. Veuillez mettre une image au format .jpeg, .png ou .gif")</script>';
                    }

                    try {
                        $sqlCheck = Connexion::getBdd()->prepare('
                        SELECT id_ad FROM Ad 
                                     WHERE rent_price = :prix_form 
                                       AND description = :description 
                                       AND lease_start = :debut_form 
                                       AND lease_end = :fin_form 
                                       AND ad_title = :titre_form 
                                       AND id_user = :UserId
                        ');
                        $sqlCheck->bindParam(':prix_form', $prix_form);
                        $sqlCheck->bindParam(':debut_form', $debut_form);
                        $sqlCheck->bindParam(':fin_form', $fin_form);
                        $sqlCheck->bindParam(':titre_form', $titre_form);
                        $sqlCheck->bindParam(':description', $description);
                        $sqlCheck->bindParam(':UserId', $idUser['id_user']);
                        $sqlCheck->execute();
                        $id_ad = $sqlCheck->fetch(PDO::FETCH_ASSOC);
                    } catch (PDOException $e) {
                        echo "Erreur : " . $e->getMessage();
                    }

                    $imageData = file_get_contents($imageTmpName1);

                    $sql5 = Connexion::getBdd()->prepare("INSERT INTO Images (ImageName, ImageData, id_ad) VALUES (:name, :data, :id_ad)");
                    $sql5->bindParam(':name', $imageName1);
                    $sql5->bindParam(':data', $imageData, PDO::PARAM_LOB);
                    $sql5->bindParam(':id_ad', $id_ad['id_ad']);

                    if ($sql5->execute()) {
                        echo '<script>alert("Annonce créée avec succès.")</script>';
                        header('Location: index.php?module=creation_annonce&action=formulaireCreationAnnonce');
                    } else {
                        echo '<script>alert("Erreur lors de la création de l\'annonce.")</script>';
                    }
                }
                }catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }
        }
        else {
            echo '<script type="text/javascript">window.onload = function () { alert("Tous les champs doivent être remplis."); } </script>';
        }
    }
}