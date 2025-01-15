<?php

require_once __DIR__ . '/../../connexion.php';

class ModeleMessagerie{
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
        $userid->bindParam(':email', $email, PDO::PARAM_STR);
        $userid->execute();
        $userid = $userid->fetch(PDO::FETCH_ASSOC);
        return $userid['id_user'];
    }

    public function getMessagerie($email)
    {
        $this->modele = new ModeleMessagerie();
        $userid = $this->modele->getId($email);
        $query = "
            SELECT 
                distinct u.id_user, u.first_name, u.last_name, m.content, m.sent_at, m.read_status, m.sender_id, m.receiver_id
            FROM 
                User u
            JOIN 
                Messages m ON u.id_user = m.receiver_id OR u.id_user = m.sender_id
            WHERE
                (m.sender_id = :id_user  OR m.receiver_id = :id_user and u.id_user != :id_user) 
            ORDER BY
                m.sent_at DESC
        ";

        $stmt = Connexion::getBdd()->prepare($query);
        $stmt -> bindParam(':id_user',$userid, PDO::PARAM_INT);
        $stmt->execute();

        $stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $list = [];

        foreach ($stmt as $key => $value) {
            if ($value['id_user'] == $userid) {
                unset($stmt[$key]);
            }
            elseif (!in_array($value['id_user'], $list)) {
                $list[] = $value['id_user'];
            }
            elseif (in_array($value['id_user'], $list)) {
                unset($stmt[$key]);
            }
        }

        return $stmt;
    }

    public  function getConv($email)
    {

        $this->modele = new ModeleMessagerie();
        $userid = $this->modele->getId($email);
        $data = $this->getMessagerie($email);

        foreach ($data as $key => $value) {
            if (isset($_POST[$key])) {
                $_SESSION['idreceiver'] = $value['receiver_id'];
                $_SESSION['idsender'] = $value['sender_id'];
                $_SESSION['nom_conv'] = $value['first_name'] . " " . $value['last_name'];
            }
        }

        $query = "
            SELECT 
                distinct u.id_user, u.first_name, u.last_name, m.content, m.sent_at, m.read_status, m.sender_id, m.receiver_id, m.id_message
            FROM 
                User u
            JOIN 
                Messages m ON u.id_user = m.receiver_id OR u.id_user = m.sender_id
            WHERE
                (m.sender_id = :id_user  OR m.receiver_id = :id_user and u.id_user != :id_user) 
            ORDER BY
                m.sent_at
        ";

        $stmt = Connexion::getBdd()->prepare($query);
        $stmt -> bindParam(':id_user',$userid, PDO::PARAM_INT);
        $stmt->execute();

        $stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);



        $conv = array();

        $listid = array();

        foreach ($stmt as $value) {
        if ((($value['sender_id'] == $_SESSION['idsender'] && $value['receiver_id'] == $_SESSION['idreceiver']) or ($value['sender_id'] == $_SESSION['idreceiver'] && $value['receiver_id'] == $_SESSION['idsender'])) and (!in_array($value['id_message'], $listid))) {
                $conv[] = $value;
                $listid[] = $value['id_message'];
            }


        }
        return $conv;
    }

    public function envoyerMessage($email)
    {
        $this->modele = new ModeleMessagerie();
        $userid = $this->modele->getId($email);
        if(isset($_POST['submit']) && isset($_POST['message']) && !empty($_POST['message'])) {
            $message = $_POST['message'];
            $receiver = $_SESSION['idsender'];
            $sender = $userid;
            $query = "
                INSERT INTO 
                    Messages (content, sent_at, read_status, sender_id, receiver_id)
                VALUES
                    (:content, NOW(), 0, :sender, :receiver)
            ";
            $stmt = Connexion::getBdd()->prepare($query);
            $stmt->bindParam(':content', $message, PDO::PARAM_STR);
            $stmt->bindParam(':sender', $sender, PDO::PARAM_INT);
            $stmt->bindParam(':receiver', $receiver, PDO::PARAM_INT);
            $stmt->execute();
        }
        header('Location: index.php?module=messagerie&action=conversation');
    }

    public function __construct()
    {
    }

}