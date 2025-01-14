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

                    if ($docName == 'url_dossierFacile') {
                        $urlPattern = "/^https:\/\/www\.[a-zA-Z_-]+\.dossierfacile\.fr$/";

                        if (preg_match($urlPattern, $docValue)) {
                            // Proceed with updating the URL
                        } else {
                            $this->handleError("Invalid URL. The URL must match the format: https://www.{user-last_name}.dossierfacile.fr");
                            return;
                        }
                    }

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
                    return;
                }
            }
        }
    }

    public function deleteFile()
    {
        // Ensure the user is logged in
        if (!isset($_SESSION['userId'])) {
            echo json_encode(['success' => false, 'message' => 'User not logged in.']);
            return;
        }

        // Parse JSON input
        $input = json_decode(file_get_contents('php://input'), true);
        if (!isset($input['docName'])) {
            echo json_encode(['success' => false, 'message' => 'No document name specified.']);
            return;
        }

        $userId = $_SESSION['userId']; // Retrieve the user's ID from the session
        $docName = $input['docName'];  // Get the document name from the input
        $pdo = Connexion::getBdd();    // Get the database connection

        try {
            // Check if the document exists and belongs to the current user
            $stmt = $pdo->prepare("SELECT id_document FROM Document WHERE file_name = ? AND id_user = ?");
            $stmt->execute([$docName, $userId]);
            $document = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($document) {
                // Delete the document from the database
                $deleteStmt = $pdo->prepare("DELETE FROM Document WHERE file_name = ? AND id_user = ?");
                $deleteStmt->execute([$docName, $userId]);

                echo json_encode(['success' => true, 'message' => 'The document has been successfully deleted.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'The specified document does not exist or does not belong to the user.']);
            }
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => 'An error occurred while deleting the document: ' . $e->getMessage()]);
        }
    }
}
