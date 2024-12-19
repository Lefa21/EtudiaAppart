<?php

require_once __DIR__  . '/../../connexion.php';

class ModeleProfil extends Connexion
{
    public function __construct() {}


    public function getUserData($emailIdentification)
{
    $query = "
        SELECT 
            u.id_user, u.first_name, u.last_name, u.email, u.mobile_number, 
            u.school_name, u.student_email, u.sexe,
            a.id_address, a.country, a.city, a.address_line, a.zipcode
        FROM 
            User u
        LEFT JOIN 
            Address a ON u.id_address = a.id_address
        WHERE 
            u.email = :email
    ";

    $stmt = Connexion::getBdd()->prepare($query);

    $stmt->bindParam(':email', $emailIdentification, PDO::PARAM_STR);

    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}



public function updateUserData($data)
{
    try {
        Connexion::getBdd()->beginTransaction();

     
        $idAddress = $this->updateUserAddress($data);  

        $queryUser = "
            UPDATE User 
            SET first_name = :first_name, last_name = :last_name, 
                email = :email, mobile_number = :mobile_number, 
                school_name = :school_name, student_email = :student_email, sexe = :sexe 
                id_address = :id_address
            WHERE email = :email
        ";

        $stmtUser = Connexion::getBdd()->prepare($queryUser);
        $stmtUser->execute([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'mobile_number' => $data['mobile_number'],
            'school_name' => $data['school_name'],
            'student_email' => $data['student_email'],
            'sexe' => $data['gender'], 
            'id_address' => $idAddress, 
        ]);


        Connexion::getBdd()->commit();
        return true;
    } catch (Exception $e) {
        Connexion::getBdd()->rollBack();
        return false;
    }
}

public function updateUserAddress($data)
{

    if (!empty($data['id_address'])) {
        $queryAddress = "
            UPDATE Address 
            SET country = :country, city = :city, 
                address_line = :address_line, zipcode = :zipcode 
            WHERE id_address = :id_address
        ";
        $stmtAddress = Connexion::getBdd()->prepare($queryAddress);
        $stmtAddress->execute([
            'country' => $data['country'],
            'city' => $data['city'],
            'address_line' => $data['address_line'],
            'zipcode' => $data['zipcode'],
            'id_address' => $data['id_address'],
        ]);
    } else {

        $queryAddress = "
            INSERT INTO Address (country, city, address_line, zipcode) 
            VALUES (:country, :city, :address_line, :zipcode)
        ";
        $stmtAddress = Connexion::getBdd()->prepare($queryAddress);
        $stmtAddress->execute([
            'country' => $data['country'],
            'city' => $data['city'],
            'address_line' => $data['address_line'],
            'zipcode' => $data['zipcode'],
        ]);

        
        return Connexion::getBdd()->lastInsertId();  
    }

    return $data['id_address'];
}



public function updatePassword($emailIdentification, $newPassword)
{
    $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
    $query = "UPDATE users SET password = ? WHERE email = ?";
    $stmt = Connexion::getBdd()->prepare($query);

    return $stmt->execute([$hashedPassword, $emailIdentification]);
}
    
}
