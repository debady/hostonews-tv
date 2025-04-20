<?php

    session_start();
    include('../traitement/connect_BD.php');
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $title = $_POST['title'];
        $description = $_POST['description'];

        $category = $_POST['category'];

        $image_url = $_POST['image_url'] ?: null;
        $video_url = $_POST['video_url'] ?: null;

        $stmt = $pdo->prepare("
            INSERT INTO derniere_news (title, description, category, image_url, video_url) 
            VALUES (:title, :description, :category, :image_url, :video_url)
        ");
        $stmt->execute([
            ':title' => $title,

            ':description' => $description,
            ':category' => $category,

            ':image_url' => $image_url,
            ':video_url' => $video_url
        ]);

        $_SESSION['alerte'] = 'Dernière news ajouter avec succes ';
        header('Location: ../form_derniere_news.php');
        exit;
    }
?>
