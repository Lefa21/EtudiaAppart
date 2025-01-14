<?php

require_once __DIR__ . '/../../connexion.php';

class ModeleMessagerie{

    public function getConvs($email)
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
        $userid = $userid['id_user'];

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
    public function __construct()
    {
    }

}