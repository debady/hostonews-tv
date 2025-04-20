<?php 

    include('connect_BD.php');
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require '../vendor/autoload.php'; 

    $verif = $varConnectBD->prepare('SELECT resset_token FROM utilisateurs WHERE utilisateurs.resset_token = ?');
    $verif ->execute(array($_GET['token']));


    if($verif->rowCount() == 1 ){

        $le_token = $_GET['token'];
        $email =$take_info['email'];

        $stmt = $pdo->prepare('SELECT * FROM utilisateurs WHERE resset_token = ?');
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
            $mail->Subject = "Confirmation d'identité HostoNews.Tv ";

            $code_verif = rand(100000,999999);
            $stmt = $pdo->prepare('UPDATE utilisateurs SET verification_code = ? WHERE resset_token = ?');
            $stmt->execute([$code_verif, $_GET['token']]);

            $mail->Body = "Voici votre code de confirmation à ne pas partager : $code_verif";
            $mail->send(); 
            echo 'code envoyer : '.$code_verif; 
        }

    }else {
        echo 'o';
    }
?>