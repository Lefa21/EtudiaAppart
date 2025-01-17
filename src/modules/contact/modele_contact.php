<?php

require_once __DIR__ . "/../../connexion.php";

class ModeleContact
{
    public function __construct()
    {
    }
    private $modele;
    function getId($email)
    {
        $query = "
            SELECT 
                u.id_user
            FROM 
                User u
            WHERE
                u.email = :email
        ";
        $userid = Connexion::getBdd()->prepare($query);
        $userid->bindParam(":email", $email, PDO::PARAM_STR);
        $userid->execute();
        $userid = $userid->fetch(PDO::FETCH_ASSOC);
        return $userid["id_user"];
    }
    public function contact()
    {
        $this->modele = new ModeleContact();
        $userid = $this->modele->getId($_SESSION["identifiant_utilisateur"]);
        $receiver = 25;
        if (
            isset(
                $_POST["submit_button"],
                $_POST["nom_form"],
                $_POST["prenom_form"],
                $_POST["message_form"]
            )
        ) {
            $message = htmlspecialchars($_POST["message_form"]);
            $sql =
                "INSERT INTO Messages (content, sent_at, read_status, sender_id, receiver_id) VALUES (:content, NOW(), 0, :sender, :receiver)";
            $stmt = Connexion::getBdd()->prepare($sql);
            $stmt->bindParam(":content", $message, PDO::PARAM_STR);
            $stmt->bindParam(":sender", $userid, PDO::PARAM_INT);
            $stmt->bindParam(":receiver", $receiver, PDO::PARAM_INT);
            if ($stmt->execute()) {
                echo '<script>alert("Message envoyé avec succès")</script>';
        }
    }
}
}
