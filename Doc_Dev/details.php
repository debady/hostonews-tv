<?php
    // Connexion à la base de données
    $host = 'localhost';
    $dbname = 'bd_hostonews_tv'; // Remplacez par le nom de votre base de données
    $username = 'root';
    $password = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Vérification de l'ID passé dans l'URL
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = intval($_GET['id']);

            // Requête pour récupérer les informations de l'émission
            $stmt = $pdo->prepare("SELECT * FROM emissions WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $emission = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$emission) {
                die("Aucune émission trouvée avec cet ID.");
            }
        } else {
            die("ID invalide.");
        }
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($emission['titre']) ?> - Détails</title>
    <link rel="stylesheet" href="styles.css"> <!-- Ajoutez votre CSS ici -->
</head>
<body>
    <div class="container">
        <h1><?= htmlspecialchars($emission['titre']) ?></h1>
        <img src="images/slideshow/emission/<?= htmlspecialchars($emission['image1']) ?>" alt="images/slideshow/emission/<?= htmlspecialchars($emission['titre']) ?>" class="img-fluid">
        <p><strong>Status :</strong> <?= htmlspecialchars($emission['le_status']) ?></p>
        <p><strong>Description courte :</strong> <?= htmlspecialchars($emission['ptt_description']) ?></p>
        <p><strong>Description complète :</strong> <?= htmlspecialchars($emission['grd_description']) ?></p>
        <p><strong>Épisode :</strong> <?= htmlspecialchars($emission['episode']) ?></p>
        <p><strong>Catégorie :</strong> <?= htmlspecialchars($emission['categorie']) ?></p>
        <p><strong>Date de publication :</strong> <?= htmlspecialchars($emission['datePublication']) ?></p>
        <?php if (!empty($emission['Videos'])): ?>
            <p><a href="<?= htmlspecialchars($emission['Videos']) ?>" target="_blank">Voir la vidéo</a></p>
        <?php endif; ?>
        <a href="index.php">Retour à la page principale</a>
    </div>
</body>
</html>
