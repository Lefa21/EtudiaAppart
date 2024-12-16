<?php

require_once __DIR__  . '/../../connexion.php';

class ModeleConnexion extends Connexion
{
    public function __construct()
    {
    }


    public function connexionUtilisateur()
    {
        if (isset($_POST['submit']) && isset($_POST['email']) && isset($_POST['password'])) {
            if (isset($_SESSION['identifiant_utilisateur']) && $_SESSION['identifiant_utilisateur'] == $_POST['email']) {
                echo 'Vous êtes déjà connecté sous l\'identifiant : ' . $_SESSION['identifiant_utilisateur'] . '<br>';
                return;
            } else {
                $email = $_POST['email'];
                $password = $_POST['password'];

                $sql = Connexion::getBdd()->prepare('SELECT * FROM User WHERE email = :email');
                $sql->bindParam(':email', $email, PDO::PARAM_STR);
                $sql->execute();

                if ($sql->rowCount() == 1) {
                    $row = $sql->fetch(PDO::FETCH_ASSOC); // permet de récupérer les données de la requete
                    if (password_verify($password, $row['password'])) {
                        $_SESSION['identifiant_utilisateur'] = $email;
                        header('Location: index.php');
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
            header('Location: index.php');
        } else {
            echo "Vous n'êtes pas connecté\n" . '<br>';
        }
    }


}


?>