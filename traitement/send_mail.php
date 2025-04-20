 <?php
    session_start();
    include('../traitement/connect_BD.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../vendor/autoload.php'; 
    require '../resset/config.php'; 

    $mail = new PHPMailer(true);

    try {
        $email = 'cyber10email@gmail.com';

        $stmt = $pdo->prepare('SELECT * FROM utilisateurs WHERE email = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user) {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; 
            $mail->SMTPAuth = true;
            $mail->Username = 'debadychatue@gmail.com'; // Adresse email SMTP
            $mail->Password = 'otgc wnuj dybj zccj'; // Utilisez une variable d'environnement pour la sécurité
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('debadychatue@gmail.com', 'HostoNews.Tv');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = "Lien de confirmation d'identité ";

            $token = bin2hex(random_bytes(50));
            $_SESSION['token_resset'] = $token;
            $_SESSION['compte_trouver'] = TRUE;

            $stmt = $pdo->prepare('UPDATE utilisateurs SET resset_token = ? WHERE email = ?');
            $stmt->execute([$token, $email]);

            $resetLink = '<a href="http://localhost/HostoTV/traitement/trait_confirm_lien_mail.php?token=$token">'.'Cliquez ici '.'</a>';
            $mail->send();

        }
    }catch (Exception $e) {

        echo "Une erreur est survenue lors de l'envoi de l'email : {$mail->ErrorInfo}";
    }
?>
