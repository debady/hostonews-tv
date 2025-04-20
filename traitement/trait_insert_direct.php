<?php
    //include('../traitement/connect_BD.php');


    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        if (isset($_FILES['le_baniere']) && $_FILES['le_baniere']['error'] === UPLOAD_ERR_OK) {

            $uploadDir = '../images/direct/'; 
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true); 
            }

            $fileTmpPath = $_FILES['le_baniere']['tmp_name'];
            $fileName = uniqid() . '_' . basename($_FILES['le_baniere']['name']);
            $fileDest = $uploadDir . $fileName;

            
            if (move_uploaded_file($fileTmpPath, $fileDest)) {
                $baniere = $fileDest; 
            } else {
                die("Erreur lors de l'upload de l'image.");
            }
        } else {
            die("Aucune image téléchargée ou une erreur est survenue.");
        }

        
        $urls = $conn->real_escape_string($_POST['urls_video']);
        $commentaire = "Pas de commentaire"; 
        $reaction = null; 
        
        $sql = "INSERT INTO direct (baniere, urls, commentaire, reaction) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("sssi", $baniere, $urls, $commentaire, $reaction);

            
            // Exécuter la requête
            if ($stmt->execute()) {
                echo "Données insérées avec succès.";
            } else {
                echo "Erreur lors de l'insertion des données : " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Erreur lors de la préparation de la requête : " . $conn->error;
        }
    }

?>
