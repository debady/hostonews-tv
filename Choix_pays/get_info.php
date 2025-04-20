<?php

    include 'connexion.php';
    $country = isset($_GET['country']) ? $_GET['country'] : 'CI';

    $stmt = $pdo->prepare("SELECT titre, contenu FROM informations WHERE pays = ?");
    $stmt->execute([strtolower($country)]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$data) {
        $data = [
            "title" => "Aucune information disponible",
            "content" => "Nous n'avons pas encore d'informations pour ce pays."
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($data);
?>