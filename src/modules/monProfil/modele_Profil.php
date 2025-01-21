<?php

class ModeleProfil
{
    private $db;

    public function __construct()
    {
        $this->db = Connexion::getBdd(); 
    }

    public function getUserData($email) 
    {

        $query = "SELECT * FROM User WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($user['id_address'] !== null) {
            $query = "SELECT * FROM address WHERE id_address = :id_address";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id_address', $user['id_address']);
            $stmt->execute();
            $address = $stmt->fetch(PDO::FETCH_ASSOC);
            
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
    

    public function updateUserData()
    {
        try {
    
            $last_name = $_POST['last_name'];
            $first_name = $_POST['first_name'];
            $email = $_POST['email'];
            $mobile_number = $_POST['mobile_number'];
            $gender = $_POST['gender'];
            $school_name = $_POST['school_name'];
            $student_email = $_POST['student_email'];
            $id = $_POST['id'];

            $address_line = $_POST['address_line'];
            $zipcode = $_POST['zipcode'];
            $city = $_POST['city'];
            $country = $_POST['country'];

          
            $query = "SELECT id_address FROM address WHERE address_line = :address_line 
                      AND city = :city AND zipcode = :zipcode AND country = :country";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':address_line', $address_line);
            $stmt->bindParam(':city', $city);
            $stmt->bindParam(':zipcode', $zipcode);
            $stmt->bindParam(':country', $country);
            $stmt->execute();
            $address = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($address) {
                $id_address = $address['id_address'];
            } else {
                $query = "INSERT INTO address (address_line, city, zipcode, country) 
                          VALUES (:address_line, :city, :zipcode, :country)";
                $stmt = $this->db->prepare($query);
                $stmt->bindParam(':address_line', $address_line);
                $stmt->bindParam(':city', $city);
                $stmt->bindParam(':zipcode', $zipcode);
                $stmt->bindParam(':country', $country);
                $stmt->execute();
                $id_address = $this->db->lastInsertId();
            }

      
            $query = "UPDATE User SET 
                        last_name = :last_name, 
                        first_name = :first_name, 
                        email = :email, 
                        mobile_number = :mobile_number, 
                        sexe = :gender, 
                        id_address = :id_address,
                        school_name = :school_name, 
                        student_email = :student_email 
                      WHERE id = :id";

            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':last_name', $last_name);
            $stmt->bindParam(':first_name', $first_name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':mobile_number', $mobile_number);
            $stmt->bindParam(':gender', $gender);
            $stmt->bindParam(':id_address', $id_address, PDO::PARAM_INT);
            $stmt->bindParam(':school_name', $school_name);
            $stmt->bindParam(':student_email', $student_email);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

      
            if (!empty($_POST['current-password']) && !empty($_POST['new-password']) && !empty($_POST['confirm-password'])) {
                if ($_POST['new-password'] === $_POST['confirm-password']) {
                    $this->updatePassword($email, $_POST['new-password']);
                }
            }

            return true;
        } catch (Exception $e) {
            error_log('Erreur SQL : ' . $e->getMessage());
            return false;
        }
    }

    public function updatePassword($email, $newPassword)
    {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $query = "UPDATE User SET password = :password WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    }
}

