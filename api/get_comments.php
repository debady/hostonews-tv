<?php
    header('Content-Type: application/json'); // La réponse sera au format JSON

    // 1. Connexion à la base de données
    // $host = 'localhost'; // Adresse du serveur MySQL
    // $dbname = 'bd_hostonews_tv'; // Nom de la base de données
    // $username = 'root'; // Nom d'utilisateur MySQL
    // $password = ''; // Mot de passe MySQL

    // try {
    //     // Création de la connexion PDO à la base de données
    //     $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // } catch (PDOException $e) {
    //     // Si la connexion échoue, envoyer une erreur HTTP 500
    //     http_response_code(500);
    //     echo json_encode(['error' => 'Database connection failed']);
    //     exit;
    // }

    include('../traitement/connect_BD.php');
    $stmt = $pdo->query("SELECT commentaire, date_creation FROM commentaires ORDER BY date_creation DESC LIMIT 10");

    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($comments);
?>
