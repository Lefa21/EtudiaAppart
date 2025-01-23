<?php

require_once __DIR__  . '/../../connexion.php';

class ModeleStudentRequests extends Connexion
{
    public function __construct()
    {
    }

    public function getRequests($idUser)
    {
            $query = "
                SELECT 
                    Ad.*,
                    Application.* ,
                    Address.*,
                    Habitation.*
                FROM Application
                INNER JOIN Ad ON Ad.id_ad = Application.id_ad 
                INNER JOIN Habitation ON Ad.id_habitation = Habitation.id_habitation
                INNER JOIN Address ON Habitation.id_address = Address.id_address 
                WHERE Application.id_user = :idUser ";
            
         
            $stmt = Connexion::getBdd()->prepare($query);
            $stmt->bindParam(':idUser', $idUser, PDO::PARAM_STR);
            $stmt->execute();
    
     
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    
            return  [
                'requests' => $results,
            ];
        }

    }


?>