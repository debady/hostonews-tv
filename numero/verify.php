<?php
// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'votre_base_de_donnees');

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $verification_code = $_POST['verification_code'];

    // Vérifier le code de vérification
    $stmt = $conn->prepare("SELECT id FROM users WHERE verification_code = ? AND is_verified = 0");
    $stmt->bind_param("s", $verification_code);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Mettre à jour l'état de vérification de l'utilisateur
        $stmt = $conn->prepare("UPDATE users SET is_verified = 1 WHERE verification_code = ?");
        $stmt->bind_param("s", $verification_code);
        if ($stmt->execute()) {
            echo "Votre compte a été vérifié avec succès.".'<a href="verify.html">Connexion</a>';
        } else {
            echo "Erreur lors de la mise à jour de la vérification.";
        }
    } else {
        echo "Code de vérification invalide ou déjà utilisé.";
    }
}
?>
