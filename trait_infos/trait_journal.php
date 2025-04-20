<?php
    session_start();

    include('../traitement/connect_BD.php');
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $titre = htmlspecialchars($_POST['titre']);

        $petiteDescription = htmlspecialchars($_POST['petiteDescription']);
        $grandeDescription = htmlspecialchars($_POST['grandeDescription']);

        $urls_videos = $_POST['urls_video'];

        if (isset($_FILES['miniature']) && $_FILES['miniature']['error'] === UPLOAD_ERR_OK) {
            $image_tmp = $_FILES['miniature']['tmp_name'];

            $image_name = uniqid() . '-' . basename($_FILES['miniature']['name']);
            $image_path = "../images/slideshow/journal/" . $image_name;

            if (!file_exists('../images/slideshow/journal')) {
                mkdir('../images/slideshow/journal', 0777, true);
            }

            if (!move_uploaded_file($image_tmp, $image_path)) {
                die("Erreur lors du téléchargement de l'image.");
            }

        } else {
            die("Erreur lors de l'upload de l'image.");
        }

        $sql = "INSERT INTO journauxtelevises (titre, petiteDescription, grandeDescription, miniature, url_Video) 
                VALUES (:titre, :petiteDescription, :grandeDescription, :miniature, :urls_videos)";

        $stmt = $connect->prepare($sql);
        try {
            $stmt->execute([

                ':titre' => $titre,
                ':petiteDescription' => $petiteDescription,

                ':grandeDescription' => $grandeDescription,
                ':miniature' => $image_name,

                ':urls_videos' => $urls_videos, // Correction ici
            ]);

            $_SESSION['alerte'] = "Journal télévisé ajouté avec succès !";
            header('Location:../form_journal.php');
            
        } catch (PDOException $e) {
            die("Erreur lors de l'insertion des données : " . $e->getMessage());
        }
    } else {
        echo "Aucune donnée reçue.";
    }
?>
