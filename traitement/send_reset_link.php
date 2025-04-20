<?php
    session_start();

    if($_GET['token']  != $_SESSION['token']){
        header('Location: ../mdp_forget.php');

    }

    //include('../traitement/connect_BD.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../vendor/autoload.php'; 
    require 'config.php'; 

    $mail = new PHPMailer(true);

    try {
        $email = $_SESSION['email_recup'];

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

            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';

            $mail->setFrom('debadychatue@gmail.com', 'HostoNews.Tv');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = "Reinitialisation de votre mot de passe";

            $token = bin2hex(random_bytes(50));
            $_SESSION['token'] =$token;
            
            $_SESSION['token_resset'] = $token;
            $_SESSION['compte_trouver'] = TRUE;
            $_SESSION['confirme_mail'] =TRUE;

            $stmt = $pdo->prepare('UPDATE utilisateurs SET resset_token = ? WHERE email = ?');
            $stmt->execute([$token, $email]);

            $resetLink = "http://localhost/HostoTV/new_mdp.php?token=$token";
            $mail->Body = "Cliquez sur le lien suivant pour Reinitialiser votre mot de passe : <a href='$resetLink'>"."Cliquez ici"."</a>";

            $mail->send();
            echo "<script>
                    sessionStorage.setItem('status', 'mail_send');
                    window.location.href = '../after_email.php';
                </script>";
                
        } else {
            echo "<script>
                    wind ow.location.href = '../mdp_forget.php?status=mail_non_connus';
                </script>";
                
        }
    } 
    catch (Exception $e) {

        echo "<script>
                window.location.href = '../mdp-forget.php?status=mail_non_connus';
            </script>";
        // "Une erreur est survenue lors de l'envoi de l'email : {$mail->ErrorInfo}";
    }

?>
