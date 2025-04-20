<?php
    // Connexion à la base de données
    include('traitement/connect_BD.php');

    // Récupération des émissions depuis la base de données
    $query = "SELECT id, titre, categorie, image1, episode FROM emissions ORDER BY categorie";
    $stmt = $pdo->query($query);
    $emissions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>