<?php
    session_start();
    //include('../traitement/connect_BD.php');
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $video_url = $_POST['video_url'];
        $alert_label = $_POST['alert_label'] ?? null;

        // $reaction_count = $_POST['reaction_count'] ?? 0;
        $title = $_POST['title'];

        $description = $_POST['description'];
        $recapitulatif = $_POST['recapitulatif'];

        $event_date = $_POST['event_date'];

        $image_path = null;
        if (!empty($_FILES['image']['name'])) {

            $upload_dir = '../images/slideshow/replay/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            $image_path = $upload_dir . uniqid() . '_' . basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
        }

        $image_path = uniqid() . '_' . basename($_FILES['image']['name']);
        $sql = "INSERT INTO replay (video_url, alert_label, title, description, recapitulatif, event_date, image_path) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
                
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute([$video_url, $alert_label, $title, $description, $recapitulatif, $event_date, $image_path])) {
            $_SESSION['alerte'] =  "Données insérées avec succès.";
            header('Location: ../form_replay.php');

        } else {
            $_SESSION['alerte'] =  "Erreur lors de l'insertion des données.";
            header('Location: ../form_replay.php');

        }
    }
?>
