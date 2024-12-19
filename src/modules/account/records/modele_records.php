<?php

require_once __DIR__  . '/../../connexion.php';

class ModeleRecords extends Connexion
{
    public function __construct() {}


    public function saveFiles()
    {
        // Vérifier si le formulaire est soumis et que tous les champs sont présents
        if (isset($_POST['submit']) && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {

            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];

            // Vérification que les mots de passe correspondent
            if ($password !== $confirmPassword) {
                echo 'Les mots de passe ne correspondent pas.' . '</br>';
                return; // Arrêter ici si les mots de passe ne correspondent pas
            }

            // Vérifier si l'email existe déjà
            $sql = Connexion::getBdd()->prepare('SELECT * FROM User WHERE email = :email');
            $sql->bindParam(':email', $email, PDO::PARAM_STR);
            $sql->execute();

            if ($sql->rowCount() >= 1) {
                echo 'Ce login existe déjà' . '</br>';
                return; // Arrêter ici si l'email est déjà pris
            }

            // Hachage du mot de passe avant l'insertion
            $hashMotDePasse = password_hash($password, PASSWORD_DEFAULT);

            // Préparation de la requête pour insérer l'utilisateur
            $sql = Connexion::getBdd()->prepare('INSERT INTO User (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)');
            $sql->bindParam(':first_name', $first_name);
            $sql->bindParam(':last_name', $last_name);
            $sql->bindParam(':email', $email);
            $sql->bindParam(':password', $hashMotDePasse);

            // Exécution de la requête
            if ($sql->execute()) {
                echo 'Inscription validée' . '</br>';
            } else {
                echo 'Erreur lors de l\'inscription, veuillez réessayer plus tard.' . '</br>';
            }
        } else {
            echo 'Tous les champs doivent être remplis.' . '</br>';
        }
    }
}
