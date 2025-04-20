<?php
    header('Content-Type: application/json');

    $host = 'localhost';
    $dbname = 'bd_hostonews_tv';
    $username = 'root';
    $password = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Database connection failed']);
        exit;
    }

    $stmt = $pdo->query("SELECT * FROM commentaires ORDER BY date_creation ASC LIMIT 10");

    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($comments);
?>
