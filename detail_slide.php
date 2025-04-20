<?php

    $titre_appli = "Tout savoir ";
    include('entete1.php');
    include('entete2.php');

    include('traitement/connect_BD.php');
    if (isset($_GET['categorie']) && !empty($_GET['categorie'])) {
        $categorie = $_GET['categorie'];

        $sql = "SELECT id, titre, ptt_description, grd_description, image1, Videos FROM emissions WHERE categorie = :categorie ORDER BY id ASC";
        $stmt = $pdo->prepare($sql);

        $stmt->execute([':categorie' => $categorie]);
        $emissions = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } else {
        die("Catégorie non spécifiée.");
    }
    
    include('scrolle.php');
    include('footer.php');

?>