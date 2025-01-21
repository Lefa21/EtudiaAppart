<?php

require_once __DIR__  . '/../../connexion.php';

class ModeleInscription extends Connexion
{
    public function __construct() {}


    public function ajoutUtilisateur()
    {

        if (isset($_POST['submit']) && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['profile_status']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
            $errors = [];

            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $profile_status = $_POST['profile_status'];
            $password = $_POST['password'];

            $sql = Connexion::getBdd()->prepare('SELECT * FROM User WHERE email = :email');
            $sql->bindParam(':email', $email, PDO::PARAM_STR);
            $sql->execute();

            if ($sql->rowCount() >= 1) {
                $errors['email'] = ' L\'adresse email existe déjà';
                return $errors;
            }

         
            $hashMotDePasse = password_hash($password, PASSWORD_DEFAULT);

   
            $sql = Connexion::getBdd()->prepare('INSERT INTO User (first_name, last_name, email, profile_status, password) VALUES (:first_name, :last_name, :email, :profile_status, :password)');
            $sql->bindParam(':first_name', $first_name);
            $sql->bindParam(':last_name', $last_name);
            $sql->bindParam(':email', $email);
            $sql->bindParam(':profile_status', $profile_status);
            $sql->bindParam(':password', $hashMotDePasse);

            if ($sql->execute()) {
                header('Location: index.php');
                exit();
            } else {
                $errors['inscription'] = "Une erreur est survenue lors de l'inscription, veuillez réessayez plus tard";
                return $errors;
            }
            return $errors;
        }
    }
}
