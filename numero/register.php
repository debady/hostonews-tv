<?php
// Afficher les erreurs (à utiliser uniquement en développement)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Charger l'autoloader de Composer
require_once 'vendor/autoload.php';

// Charger les variables d'environnement
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Utiliser les espaces de noms nécessaires
use Twilio\Rest\Client;

// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'bd_hostonews_tv');

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $phone = $_POST['phone'];
    $password_plain = $_POST['password'];
    $password = password_hash($password_plain, PASSWORD_BCRYPT);
    $verification_code = rand(100000, 999999);

    // Valider le numéro de téléphone (format international)
    if (!preg_match('/^\+\d{10,15}$/', $phone)) {
        echo "Numéro de téléphone invalide. Utilisez le format +33612345678.";
        exit();
    }

    // Vérifier si le numéro de téléphone existe déjà
    $check_phone = $conn->prepare("SELECT id FROM users WHERE phone = ?");
    $check_phone->bind_param("s", $phone);
    $check_phone->execute();
    $check_phone->store_result();

    if ($check_phone->num_rows > 0) {
        echo "Ce numéro de téléphone est déjà utilisé.";
    } else {
        // Insérer l'utilisateur dans la base de données
        $stmt = $conn->prepare("INSERT INTO users (phone, password, verification_code) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $phone, $password, $verification_code);
        if ($stmt->execute()) {
            // Récupérer les identifiants Twilio depuis les variables d'environnement
            $sid = $_ENV['TWILIO_SID'];
            $token = $_ENV['TWILIO_TOKEN'];
            $twilio_number = $_ENV['TWILIO_NUMBER'];

            // Créer un client Twilio
            $client = new Client($sid, $token);

            // Envoyer le SMS
            try {
                $message = $client->messages->create(
                    $phone, // Numéro du destinataire
                    array(
                        'from' => $twilio_number,
                        'body' => "Votre code de vérification est : $verification_code"
                    )
                );
                echo "Un code de vérification a été envoyé sur votre numéro de téléphone.<br>".'<a href="verify.html">Connexion</a>' ;
            } catch (Exception $e) {
                echo "Erreur lors de l'envoi du SMS : " . $e->getMessage();
            }
        } else {
            echo "Erreur lors de l'inscription.";
        }
    }
}
?>
