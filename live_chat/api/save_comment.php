<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type');

    // Débogage pour voir si les données arrivent
    $rawInput = file_get_contents('php://input');

    if (empty($rawInput)) {
        http_response_code(400);
        echo json_encode(['error' => 'No data received', 'raw_input' => $rawInput]);
        exit;
    }

    $data = json_decode($rawInput, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid JSON', 'details' => json_last_error_msg()]);
        exit;
    }

    // Vérifier les données reçues
    if (!isset($data['nom_prenom'], $data['photo'], $data['utilisateur_id'], $data['commentaire'])) {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid input']);
        exit;
    }

    $nom_prenom = $data['nom_prenom'];
    $photo = $data['photo'];
    $utilisateur_id = $data['utilisateur_id'];
    $commentaire = $data['commentaire'];

    // Connexion à la base de données
    $host = 'localhost';
    $dbname = 'bd_hostonews_tv';
    $username = 'root';
    $password = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $stmt = $pdo->prepare("INSERT INTO commentaires (nom_prenom, photo, utilisateur_id, commentaire) VALUES (:nom_prenom, :photo, :utilisateur_id, :commentaire)");
        $stmt->bindParam(':nom_prenom', $nom_prenom);
        $stmt->bindParam(':photo', $photo);
        $stmt->bindParam(':utilisateur_id', $utilisateur_id);
        $stmt->bindParam(':commentaire', $commentaire);

        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'Failed to insert comment']);
        }
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Database connection failed', 'details' => $e->getMessage()]);
    }
?>