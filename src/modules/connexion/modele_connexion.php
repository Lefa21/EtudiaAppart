<?php
// ModeleConnexion.php
require_once __DIR__  . '/../../connexion.php';

class ModeleConnexion extends Connexion
{
    public function __construct() {}

    public function connexionUtilisateur()
    {
        $errors = [];

<<<<<<< HEAD
        // Validation des champs
        if (empty($_POST['email'])) {
            $errors['email'] = 'L\'adresse email est obligatoire.';
=======
                $sql = Connexion::getBdd()->prepare('SELECT * FROM User WHERE email = :email');
                $sql->bindParam(':email', $email, PDO::PARAM_STR);
                $sql->execute();

                if ($sql->rowCount() == 1) {
                    $row = $sql->fetch(PDO::FETCH_ASSOC); // permet de récupérer les données de la requete
                    if (password_verify($password, $row['password'])) {
                        $_SESSION['identifiant_utilisateur'] = $row["id_user"];
                        $_SESSION['email'] = $email;
                        $_SESSION['user_status'] =  $row["profile_status"];
                        $_SESSION['user_first_name'] =  $row["first_name"];
                        $_SESSION['user_last_name'] =  $row["last_name"];
                        $_SESSION['profile_picture'] =  $row["profile_picture"];
                        header('Location: index.php');
                    } else {
                        echo 'Login ou mot de passe incorrect' . '<br>';
                    }
                } else {
                    echo 'Login ou mot de passe incorrect';
                }
                return;
            }
>>>>>>> 29e496e (Favorites working)
        }

        if (empty($_POST['password'])) {
            $errors['password'] = 'Le mot de passe est obligatoire.';
        }

        if (!empty($errors)) {
            return $errors; // Retourne les erreurs pour affichage dans la vue
        }

        // Vérification des informations en base de données
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = Connexion::getBdd()->prepare('SELECT * FROM User WHERE email = :email');
        $sql->bindParam(':email', $email, PDO::PARAM_STR);
        $sql->execute();

        if ($sql->rowCount() == 1) {
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $row['password'])) {
                // Connexion réussie
                $_SESSION['identifiant_utilisateur'] = $row['id_user'];
                $_SESSION['userId'] = $row['id_user'];
                $_SESSION['email'] = $email;
                $_SESSION['user_status'] = $row['profile_status'];
                $_SESSION['user_first_name'] = $row['first_name'];
                $_SESSION['user_last_name'] = $row['last_name'];
                $_SESSION['profile_picture'] = $row['profile_picture'];
                header('Location: index.php');
                exit;
            } else {
                $errors['password'] = 'Le mot de passe est incorrect.';
            }
        } else {
            $errors['email'] = 'Aucun compte trouvé pour cette adresse email.';
        }

        return $errors;
    }

    public function deconnexionUtilisateur()
    {
        if (isset($_SESSION['identifiant_utilisateur']) || isset($_SESSION['userId'])) {
            session_destroy();
            header('Location: index.php');
            exit;
        }
    }
}