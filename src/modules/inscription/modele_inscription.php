<?php

require_once __DIR__  . '/../../connexion.php';

class ModeleInscription extends Connexion
{
    public function __construct()
    {
    }


    public function ajoutUtilisateur()
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
    
    


    public function connexionUtilisateur()
    {
        if (isset($_POST['submit']) && isset($_POST['login']) && isset($_POST['password'])) {
            if (isset($_SESSION['identifiant_utilisateur']) && $_SESSION['identifiant_utilisateur'] == $_POST['login']) {
                echo 'Vous êtes déjà connecté sous l\'identifiant : ' . $_SESSION['identifiant_utilisateur'] . '<br>';
                return;
            } else {
                $login = $_POST['login'];
                $password = $_POST['password'];

                $sql = Connexion::getBdd()->prepare('SELECT * FROM joueur WHERE username = :login');
                $sql->bindParam(':login', $login, PDO::PARAM_STR);
                $sql->execute();

                if ($sql->rowCount() == 1) {
                    $row = $sql->fetch(PDO::FETCH_ASSOC); // permet de récupérer les données de la requete
                    if (password_verify($password, $row['password'])) {
                        $_SESSION['identifiant_utilisateur'] = $login;
                        header('Location: index.php');
//              echo 'variable session : ' . $_SESSION['identifiant_utilisateur'] .'<br>';
//              echo 'Connexion validée' . '</br>';
                    } else {
                        echo 'Login ou mot de passe incorrect' . '<br>';
                    }
                } else {
                    echo 'Login ou mot de passe incorrect';
                }
                return;
            }
        }
    }

    public function deconnexionUtilisateur()
    {
        if (isset($_SESSION['identifiant_utilisateur'])) {
            echo 'Déconnexion réussie, identifiant :' . $_SESSION['identifiant_utilisateur'] . '<br>';
            unset($_SESSION['identifiant_utilisateur']);
        } else {
            echo "Vous n'êtes pas connecté\n" . '<br>';
        }
    }


}


?>