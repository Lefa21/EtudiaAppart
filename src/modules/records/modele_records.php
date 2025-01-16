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

    public function updateUserUrl()
    {
        // Ensure the request is POST and the user is logged in
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_SESSION['userId'])) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Invalid request or user not logged in.']);
            exit;
        }

        $userId = $_SESSION['userId'];
        $pdo = Connexion::getBdd();
        $inputs = json_decode(file_get_contents('php://input'), true); // Parse JSON input

        foreach ($inputs as $fileName => $fileValue)

            if (!empty($fileName && !empty($fileValue))) {
                if ($fileName == 'url_dossierFacile') {
                    $urlPattern = "/^https:\/\/www\.[a-zA-Z_-]+\.dossierfacile\.fr$/";

                    if (!preg_match($urlPattern, $fileValue)) {
                        header('Content-Type: application/json');
                        echo json_encode([
                            'success' => false,
                            'message' => 'Invalid URL. The URL must match the format: https://www.{user-last_name}.dossierfacile.fr',
                        ]);
                        exit;
                    }
                }

                try {
                    // Check if the document already exists
                    $stmt = $pdo->prepare("SELECT id_document FROM Document WHERE id_user = ? AND file_name = ?");
                    $stmt->execute([$userId, $fileName]);
                    $existingDoc = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($existingDoc) {
                        // Update existing document
                        $stmt = $pdo->prepare("UPDATE Document SET upload_date = NOW(), description = ? WHERE id_document = ?");
                        $stmt->execute([$fileValue, $existingDoc['id_document']]);
                    } else {
                        // Insert new document
                        $stmt = $pdo->prepare("INSERT INTO Document (id_user, file_name, upload_date, description) VALUES (?, ?, NOW(), ?)");
                        $stmt->execute([$userId, $fileName, $fileValue]);
                    }

                    // Respond with success
                    header('Content-Type: application/json');
                    echo json_encode([
                        'success' => true,
                        'message' => 'Document updated successfully.',
                        'redirect' => '?module=records&action=monDossier', // Include redirect URL
                    ]);
                    exit;
                } catch (PDOException $e) {
                    header('Content-Type: application/json');
                    echo json_encode([
                        'success' => false,
                        'message' => 'An error occurred while updating the document: ' . $e->getMessage(),
                    ]);
                    exit;
                }
            }
    }

    public function deleteFile()
    {
        // Ensure the user is logged in
        if (!isset($_SESSION['userId'])) {
            header('Content-Type: application/json');
            echo json_encode([
                'success' => false,
                'message' => 'User not logged in.'
            ]);
            exit;
        }

        // Parse JSON input
        $input = json_decode(file_get_contents('php://input'), true);
        if (!isset($input['docName'])) {
            header('Content-Type: application/json');
            echo json_encode([
                'success' => false,
                'message' => 'No document name specified.'
            ]);
            exit;
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

                header('Content-Type: application/json');
                // Include redirect URL
                echo json_encode([
                    'success' => true,
                    'message' => 'The document has been successfully deleted.',
                    'redirect' => '?module=records&action=monDossier',
                ]);
                exit;
            } else {
                header('Content-Type: application/json');
                echo json_encode([
                    'success' => false,
                    'message' => 'The specified document does not exist or does not belong to the user.'
                ]);
                exit;
            }
        } catch (PDOException $e) {
            header('Content-Type: application/json');
            echo json_encode([
                'success' => false,
                'message' => 'An error occurred while deleting the document: ' . $e->getMessage()
            ]);
            exit;
        }
    }
}
