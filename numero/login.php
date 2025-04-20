<?php
session_start();

// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'votre_base_de_donnees');

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Récupérer les informations de l'utilisateur
    $stmt = $conn->prepare("SELECT id, password, is_verified FROM users WHERE phone = ?");
    $stmt->bind_param("s", $phone);
    $stmt->execute();
    
    $stmt->bind_result($id, $hashed_password, $is_verified);
    $stmt->fetch();

    if ($id && password_verify($password, $hashed_password)) {
        if ($is_verified) {
            // Initialiser la session
            $_SESSION['user_id'] = $id;
            header("Location: profile.php");
        } else {
            echo "Votre compte n'a pas été vérifié. Veuillez vérifier votre compte.";
        }
    } else {
        echo "Numéro de téléphone ou mot de passe incorrect.";
    }
}
?>
