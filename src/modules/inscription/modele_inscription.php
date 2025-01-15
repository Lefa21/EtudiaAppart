<?php

require_once __DIR__  . '/../../connexion.php';
require_once 'C:/xampp/htdocs/EtudiaAppart/vendor/autoload.php'; // Inclure PHPMailer via Composer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ModeleInscription extends Connexion
{
    public function __construct()
    {
    }

    /**
     * Envoie un email via le SMTP de Mailtrap.
     *
     * @param string $to       L'adresse email du destinataire.
     * @param string $subject  L'objet de l'email.
     * @param string $body     Le contenu HTML de l'email.
     * @return bool            Retourne true si l'email a été envoyé, false sinon.
     */
    private function sendMail($to, $subject, $body)
    {
        $mail = new PHPMailer(true);
        try {
            // Configuration du serveur SMTP Mailtrap
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = '787465f2de2697'; // Votre identifiant Mailtrap
            $mail->Password = '3533f50af7726d'; // Votre mot de passe Mailtrap

            // Expéditeur et destinataire
            $mail->setFrom('a01e94ac68-997602+1@inbox.mailtrap.io', 'EtudiAppart'); // Adresse et nom de l'expéditeur
            $mail->addAddress($to); // Adresse du destinataire

            // Contenu de l'email
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $body;

            // Envoyer
            $mail->send();
            return true;
        } catch (Exception $e) {
            error_log("Erreur d'envoi d'email : " . $mail->ErrorInfo);
            return false;
        }
    }


    public function ajoutUtilisateur()
    {

        // Vérifier si le formulaire est soumis et que tous les champs sont présents
        if (isset($_POST['submit']) && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['profile_status']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
            
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $profile_status = $_POST['profile_status'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];

            // Vérification que les mots de passe correspondent
            if ($password !== $confirmPassword) {
                echo 'Les mots de passe ne correspondent pas.' . '</br>';
                return; // Arrêter ici si les mots de passe ne correspondent pas
            }
            
            // Vérification que le role est bien choisi
            if (empty($profile_status)) {
                echo 'Veuillez sélectionner un rôle valide.' . '</br>';
                return; // Arrêter ici si le role n'est pas choisi
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

            // email d'activation
            $activation_token = bin2hex(openssl_random_pseudo_bytes(16, $strong));
            $activation_token_hashed = hash("sha256", $activation_token);
    
            // Préparation de la requête pour insérer l'utilisateur
            $sql = Connexion::getBdd()->prepare('INSERT INTO User (first_name, last_name, email, profile_status, password, account_activation_hash) VALUES (:first_name, :last_name, :email, :profile_status, :password, :account_activation_hash)');
            $sql->bindParam(':first_name', $first_name);
            $sql->bindParam(':last_name', $last_name);
            $sql->bindParam(':email', $email);
            $sql->bindParam(':profile_status', $profile_status);
            $sql->bindParam(':password', $hashMotDePasse);
            $sql->bindParam(':account_activation_hash', $activation_token_hashed);
    
            // Exécution de la requête
            if ($sql->execute()) {
                header('Location: index.php?module=inscription&action=signUpSuccess');
                // Préparer l'email
                $subject = "Activation du compte EtudiAppart";
                $body = "
                    <p>Bonjour,</p>
                    <p>Veuillez cliquer sur le lien ci-dessous pour confirmer votre email :</p>
                    <p><a href='http://localhost/EtudiaAppart/index.php?module=resetPassword&action=confirmEmail&token=$activation_token'>
                    Réinitialiser mon mot de passe</a></p>
                    <p>Ce lien expirera dans 10 minutes.</p>
                    <p>Cordialement,<br>L'équipe EtudiAppart</p>
                ";

                // Envoyer l'email
                if ($this->sendMail($email, $subject, $body)) {
                    echo "Un email de réinitialisation a été envoyé à votre adresse.";
                    exit();;
                } else {
                    echo "Une erreur s'est produite lors de l'envoi de l'email.";
                    exit();
                }
            } else {
                echo 'Erreur lors de l\'inscription, veuillez réessayer plus tard.' . '</br>';
            }
        } else {
            echo 'Tous les champs doivent être remplis.' . '</br>';
        }
    }

    public function confirmEmail(){
        
    }

}


?>