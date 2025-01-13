<?php

require_once __DIR__  . '/../../connexion.php';

class ModeleRecords extends Connexion
{
    public function __construct() {}

    function getUserData()
    {
        $userId = $_SESSION['userId'];
        $query = "
        SELECT 
            u.id_user, u.first_name, u.last_name, u.profile_status, u.email, u.school_name
        FROM 
            User u
        WHERE 
            u.id_user = :userId
    ";

        $stmt = Connexion::getBdd()->prepare($query);

        $stmt->bindParam(':userId', $userId, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function handleError($message)
    {
        // Function to handle errors (placeholder for now)
        echo "<div class='error'>$message</div>";
    }

    public function fetchUserDocuments()
    {
        // Function to display user's uploaded documents
        $userId = $_SESSION['userId'];
        $pdo = Connexion::getBdd();
        $stmt = $pdo->prepare("SELECT id_document, file_name, description FROM Document WHERE id_user = ?");
        $stmt->execute([$userId]);
        $documents = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($documents) {
            return $documents;
        } else {
            return null;
        }
    }

    public function updateUserDocument()
    {
        // URL upload logic
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['userId'];
            $pdo = Connexion::getBdd();
            $documents = ["url_dossierFacile"];

            foreach ($documents as $docName) {
                if (!empty($_POST[$docName])) {
                    $docValue = $_POST[$docName];

                    // Check if the document already exists
                    $stmt = $pdo->prepare("SELECT id_document FROM Document WHERE id_user = ? AND file_name = ?");
                    $stmt->execute([$userId, $docName]);
                    $existingDoc = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($existingDoc) {
                        // Update existing document
                        $stmt = $pdo->prepare("UPDATE Document SET upload_date = NOW(), description = ? WHERE id_document = ?");
                        $stmt->execute([$docValue, $existingDoc['id_document']]);
                    } else {
                        // Insert new document
                        $stmt = $pdo->prepare("INSERT INTO Document (id_user, file_name, upload_date, description) VALUES (?, ?, NOW(), ?)");
                        $stmt->execute([$userId, $docName, $docValue]);
                    }
                } else {
                    $this->handleError("No URL provided for $docName.");
                }
            }
        }
    }
}
