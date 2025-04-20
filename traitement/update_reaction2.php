<?php
// Assurez-vous que l'utilisateur a envoyé une requête POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $reaction_count = $_POST['reaction_count'] ?? null;

    // Valider les données
    if ($id && $reaction_count !== null) {
        try {
            // Connexion à la base de données
            $pdo = new PDO('mysql:host=localhost;dbname=bd_hostonews_tv', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Mise à jour de la réaction dans la base de données
            $stmt = $pdo->prepare("UPDATE replay SET reaction_count = :reaction_count WHERE id = :id");
            $stmt->execute([':reaction_count' => $reaction_count, ':id' => $id]);

            // Répondre avec succès
            echo "Réaction mise à jour avec succès";
        } catch (PDOException $e) {
            echo 'Erreur lors de la mise à jour: ' . $e->getMessage();
        }
    } else {
        echo "Données invalides";
    }
}
?>
