<?php
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['emoji']) && isset($data['video_id'])) {
        $emoji = $data['emoji'];
        $video_id = $data['video_id'];

        $host = 'localhost';
        $db = 'bd_hostonews_tv';
        $user = 'root';
        $pass = '';

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare('SELECT reaction FROM direct WHERE id = :video_id');
            $stmt->execute(['video_id' => $video_id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                $new_reaction = $row['reaction'] + 1;

                $updateStmt = $pdo->prepare('UPDATE direct SET reaction = :reaction WHERE id = :video_id');
                $updateStmt->execute([
                    'reaction' => $new_reaction,
                    'video_id' => $video_id
                ]);

                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Vidéo non trouvée']);
            }
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => 'Erreur de base de données: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Données manquantes']);
    }
?>



