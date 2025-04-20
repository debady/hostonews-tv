<?php
    session_start();
    //include('../traitement/connect_BD.php');
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $titre = $_POST['titre'];
        $Urls = $_POST['Urls'];
        $le_status = $_POST['le_status'];

        $ptt_description = $_POST['ptt_description'] ?? null;
        $grd_description = $_POST['grd_description'] ?? null;

        $episode = $_POST['episode'] ?? null;
        $categorie = $_POST['categorie'] ?: $_POST['categorie_manuel'];
        $videos = $_POST['videos'] ?? null;

        $image1_nom = null;
        $image2_nom = null;

        if (!file_exists('../images/slideshow/emission/')) {
            mkdir('../images/slideshow/emission/', 0777, true);
        }

        if (isset($_FILES['image1']) && $_FILES['image1']['error'] === UPLOAD_ERR_OK) {
            $image1_nom = basename($_FILES['image1']['name']);

            $chemin_image1_nom = '../images/slideshow/emission/'.basename($_FILES['image1']['name']);
            move_uploaded_file($_FILES['image1']['tmp_name'], $chemin_image1_nom);
        }

        if (isset($_FILES['image2']) && $_FILES['image2']['error'] === UPLOAD_ERR_OK) {
            $image2_nom = basename($_FILES['image2']['name']);

            $chemin_image2_nom = '../images/slideshow/emission/'.basename($_FILES['image2']['name']);
            move_uploaded_file($_FILES['image2']['tmp_name'],$chemin_image2_nom);
        }

        $sql = "INSERT INTO emissions (url_emission,titre,le_status, ptt_description, grd_description, episode, image1, image2, categorie, Videos)
                VALUES (:url_emission,:titre, :le_status, :ptt_description, :grd_description, :episode, :image1, :image2, :categorie, :videos)";

        $stmt = $pdo->prepare($sql);

        try {
            $stmt->execute([
                ':url_emission' => $Urls,
                ':titre' => $titre,
                ':le_status' => $le_status,

                ':ptt_description' => $ptt_description,
                ':grd_description' => $grd_description,

                ':episode' => $episode,
                ':image1' => $image1_nom,

                ':image2' => $image2_nom,
                ':categorie' => $categorie,

                ':videos' => $videos
            ]);

            
            $_SESSION['alerte'] ="<p style='color:green;'>".  "Emission ajoutée avec succès !". "</p>";
            header('Location:../form_emission.php');
        } catch (PDOException $e) {
            echo "Erreur lors de l'insertion : " . $e->getMessage();
        }
    }else {
        echo 'acces interdit';
    }
?>