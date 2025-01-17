<?php

class ModeleProfil
{
    private $db;

    public function __construct()
    {
        $this->db = Connexion::getBdd(); // Connexion à la base de données
    }

    public function getUserData($email) 
    {
        // Récupérer les informations de l'utilisateur
        $query = "SELECT * FROM User WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Si l'utilisateur a une adresse, récupérer l'adresse associée
        if ($user['id_address'] !== null) {
            $query = "SELECT * FROM address WHERE id_address = :id_address";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id_address', $user['id_address']);
            $stmt->execute();
            $address = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Ajouter l'adresse à l'utilisateur
            $user['address_line'] = $address["address_line"];
            $user['country'] = $address["country"];
            $user['city'] = $address["city"];
            $user['zipcode'] = $address["zipcode"]; 
        }else{
            $user['address_line'] = "";
            $user['country'] = "";
            $user['city'] = "";
            $user['zipcode'] = ""; 
        }
    
        return $user;
    }
    

    public function updateUserData($data)
    {
        try {
            // Vérifier si l'adresse existe déjà dans la table address
            $query = "SELECT id_address FROM address WHERE address_line = :address_line 
                      AND city = :city AND zipcode = :zipcode AND country = :country";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':address_line', $data['address_line']);
            $stmt->bindParam(':city', $data['city']);
            $stmt->bindParam(':zipcode', $data['zipcode']);
            $stmt->bindParam(':country', $data['country']);
            $stmt->execute();
            $address = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($address) {
                // Si l'adresse existe, récupérer l'id de l'adresse existante
                $id_address = $address['id_address'];
            } else {
                // Sinon, créer une nouvelle adresse
                $query = "INSERT INTO address (address_line, city, zipcode, country) 
                          VALUES (:address_line, :city, :zipcode, :country)";
                $stmt = $this->db->prepare($query);
                $stmt->bindParam(':address_line', $data['address_line']);
                $stmt->bindParam(':city', $data['city']);
                $stmt->bindParam(':zipcode', $data['zipcode']);
                $stmt->bindParam(':country', $data['country']);
                $stmt->execute();
                $id_address = $this->db->lastInsertId(); // Récupérer l'id de la nouvelle adresse
            }
    
            // Mettre à jour les données de l'utilisateur
            $query = "UPDATE User SET 
                        last_name = :last_name, 
                        first_name = :first_name, 
                        email = :email, 
                        mobile_number = :mobile_number, 
                        gender = :gender, 
                        id_address = :id_address,  // Mise à jour de l'id_address
                        school_name = :school_name, 
                        student_email = :student_email 
                      WHERE id = :id";
            
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':last_name', $data['last_name']);
            $stmt->bindParam(':first_name', $data['first_name']);
            $stmt->bindParam(':email', $data['email']);
            $stmt->bindParam(':mobile_number', $data['mobile_number']);
            $stmt->bindParam(':gender', $data['gender']);
            $stmt->bindParam(':id_address', $id_address, PDO::PARAM_INT);
            $stmt->bindParam(':school_name', $data['school_name']);
            $stmt->bindParam(':student_email', $data['student_email']);
            $stmt->bindParam(':id', $data['id'], PDO::PARAM_INT);
    
            return $stmt->execute();
        } catch (Exception $e) {
            error_log('Erreur SQL : ' . $e->getMessage());
            return false;
        }
    }
    

    public function updatePassword($email, $newPassword)
    {
        try {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $query = "UPDATE User SET password = :password WHERE email = :email";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':email', $email);
            return $stmt->execute();
        } catch (Exception $e) {
            error_log('Erreur SQL : ' . $e->getMessage());
            return false;
        }
    }
}
