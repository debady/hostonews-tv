<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'votre_base_de_donnees');

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Récupérer les informations de l'utilisateur
$stmt = $conn->prepare("SELECT phone, created_at FROM users WHERE id = ?");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();

$stmt->bind_result($phone, $created_at);
$stmt->fetch();

echo "<h1>Profil de l'utilisateur</h1>";
echo "<p>Numéro de téléphone: " . htmlspecialchars($phone) . "</p>";
echo "<p>Date d'inscription: " . $created_at . "</p>";
echo '<a href="deconnexion.php">deConnexion</a>';
?>
