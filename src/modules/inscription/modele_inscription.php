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

            // token email d'activation
            $activation_token = bin2hex(openssl_random_pseudo_bytes(16, $strong));
            $activation_token_hashed = hash("sha256", $activation_token);
            $activation_token_expires_at = date("Y-m-d H:i:s", time() + 60 * 10);
    
            // Préparation de la requête pour insérer l'utilisateur
            $sql = Connexion::getBdd()->prepare('INSERT INTO User (first_name, last_name, email, profile_status, password, account_activation_hash, activation_token_expires_at) VALUES (:first_name, :last_name, :email, :profile_status, :password, :account_activation_hash, :activation_token_expires_at)');
            $sql->bindParam(':first_name', $first_name);
            $sql->bindParam(':last_name', $last_name);
            $sql->bindParam(':email', $email);
            $sql->bindParam(':profile_status', $profile_status);
            $sql->bindParam(':password', $hashMotDePasse);
            $sql->bindParam(':account_activation_hash', $activation_token_hashed);
            $sql->bindParam(':activation_token_expires_at', $activation_token_expires_at);
    
            // Exécution de la requête
            if ($sql->execute()) {
                header('Location: index.php?module=inscription&action=signUpSuccess');
                // Préparer l'email
                $subject = "Activation du compte EtudiAppart";
                $body = "
                    <p>Bonjour,</p>
                    <p>Veuillez cliquer sur le lien ci-dessous pour confirmer votre email :</p>
                    <p><a href='http://localhost/EtudiaAppart/index.php?module=inscription&action=confirmEmail&token=$activation_token'>
                    Activer le compte</a></p>
                    <p>Ce lien expirera dans 10 minutes.</p>
                    <p>Cordialement,<br>Staff EtudiAppart</p>
                ";

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

    public function confirmEmail(){
    echo "Méthode confirmEmail appelée.<br>";

    if (!isset($_GET['token']) || empty($_GET['token'])) {
        echo "Token manquant ou vide.<br>";
        return;
    }

    $activation_token = $_GET['token'];
    echo "Token reçu : $activation_token<br>";

    $activation_token_hashed = hash("sha256", $activation_token);

    try {
        $checkSql = Connexion::getBdd()->prepare('
            SELECT email
            FROM User 
            WHERE account_activation_hash = :activation_token_hash
            AND activation_token_expires_at > NOW()
        ');
        $checkSql->bindParam(':activation_token_hash', $activation_token_hashed, PDO::PARAM_STR);
        $checkSql->execute();

        $user = $checkSql->fetch(PDO::FETCH_ASSOC);
        if (!$user) {
            echo "Token invalide ou expiré.<br>";
            return;
        }

        echo "Utilisateur trouvé : " . $user['email'] . "<br>";

        $email = $user['email'];
        $updateSql = Connexion::getBdd()->prepare('
            UPDATE User 
            SET account_activation_hash = NULL, activation_token_expires_at = NULL
            WHERE email = :email
        ');
        $updateSql->bindParam(':email', $email, PDO::PARAM_STR);

        if ($updateSql->execute()) {
            echo "Compte activé avec succès.<br>";
            header('Location: index.php?module=inscription&action=registerSuccessful');
        } else {
            echo "Échec de l'activation du compte.<br>";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage() . "<br>";
    }
}


}
