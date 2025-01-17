<?php

require_once __DIR__  . '/../../connexion.php';

class ModeleOwnerRequests extends Connexion
{
    public function __construct() {}

    public function getApply($idUser)
    {
        $query = "
    SELECT 
        Ad.*,
        Ad.id_user AS id_owner,
        Application.*,
        Application.id_user AS id_student, 
        Address.*,
        Habitation.*,
        Document.*,
        Document.id_user AS id_student 
    FROM Application
    INNER JOIN Document ON Document.id_user = Application.id_user
    INNER JOIN Ad ON Ad.id_ad = Application.id_ad 
    INNER JOIN Habitation ON Ad.id_habitation = Habitation.id_habitation
    INNER JOIN Address ON Habitation.id_address = Address.id_address 
    WHERE Ad.id_user = :idUser";




        $stmt = Connexion::getBdd()->prepare($query);
        $stmt->bindParam(':idUser', $idUser, PDO::PARAM_STR);
        $stmt->execute();


        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);


        return  [
            'requests' => $results,
        ];
    }


    public function getApplication()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

            $id_application = $_POST["id_application"];
            $id_student = $_POST["id_student"];
            $id_owner = $_POST["id_owner"];

            $query = "
            SELECT 
                Ad.*,
                Application.*,
                Address.*,
                Habitation.*,
                Document.*
            FROM Application
            INNER JOIN Document ON Document.id_user = :id_student
            INNER JOIN Ad ON Ad.id_ad = Application.id_ad 
            INNER JOIN Habitation ON Ad.id_habitation = Habitation.id_habitation
            INNER JOIN Address ON Habitation.id_address = Address.id_address 
            WHERE Application.id_application = :id_application
            AND Ad.id_user = :id_owner";
        



            $stmt = Connexion::getBdd()->prepare($query);
            $stmt->bindParam(':id_application', $id_application, PDO::PARAM_STR);
            $stmt->bindParam(':id_student', $id_student, PDO::PARAM_STR);
            $stmt->bindParam(':id_owner', $id_owner, PDO::PARAM_STR);
            $stmt->execute();


            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return  $results;
        }
        else{
            return null;
    }
}
}

