<?php 

    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require '../vendor/autoload.php'; 
    // require 'C:/wamp64/www/sendmail/vendor/autoload.php'; 

    //include('connect_BD.php');
    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $recup_email = htmlspecialchars($_POST["email"] ?? '');
        $recup_mdp1 = htmlspecialchars($_POST["mdp1"] ?? '');

        $recup_mdp2 = htmlspecialchars($_POST["mdp2"] ?? '');
        $photo_default = 'default'.rand(1,4).'.png';

        $var_acces_token = md5(15);

        $recaptchaResponse = $_POST['g-recaptcha-response'] ?? '';
        $secretKey = '6LdmVYgqAAAAAFkRCPhftNaxXAHk30vGTLUgAxNs';
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$recaptchaResponse");
        $responseKeys = json_decode($response, true);

        if ($responseKeys['success']) {
            if($recup_mdp1 == $recup_mdp2){

                $verif_email = "SELECT email FROM utilisateurs WHERE email = '$recup_email' ";
                $resultats_verif_email = $conn->query($verif_email);

                if($resultats_verif_email->num_rows == 0){
                    if(strlen($recup_mdp1) >= 8 && 

                        preg_match('/[a-z]/', $recup_mdp1) &&             
                        preg_match('/[A-Z]/', $recup_mdp1) && 

                        preg_match('/[0-9]/', $recup_mdp1) &&            
                        preg_match('/[\W]/', $recup_mdp1) ){

                        $code_verif = rand(100000,999999);
                        
                        $recup_mdp1 = sha1($recup_mdp1);
                        $sql = "INSERT INTO utilisateurs (email, mot_de_passe, acces_token,verification_code,photo_profil) VALUES ('$recup_email','$recup_mdp1','$var_acces_token','$code_verif','$photo_default')";
            
                        if ($conn->query($sql) === TRUE) {
                            
                            $_SESSION['code_verif'] = $code_verif;
                            $mail = new PHPMailer(true);

                            try {
                                $email = $recup_email;

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
                                    $mail->Subject = "Confirmation d'identité HostoNews.Tv ";

                                    $token = bin2hex(random_bytes(50));
                                    $_SESSION['token_resset'] = $token;
                                    $_SESSION['compte_trouver'] = TRUE;

                                    $stmt = $pdo->prepare('UPDATE utilisateurs SET resset_token = ? WHERE email = ?');
                                    $stmt->execute([$token, $email]);

                                    $resetLink = "http://localhost/HostoTV/traitement/trait_confirm_lien_mail.php?token=$token";
                                    $random_methode = rand(1,2);

                                    if($random_methode == 1 ){

                                        $_SESSION['confirme_mail'] = $resetLink ;
                                        $mail->Body = "Cliquez sur le lien suivant pour Validé votre profile : <a href='$resetLink'>"."Cliquez ici "."</a>";

                                        echo "<script>
                                            sessionStorage.setItem('status', 'mail_send');
                                            window.location.href = '../after_email.php';
                                        </script>";

                                    }else {
                                        $mail->Body = "Voici votre code de confirmation à ne pas partager : $code_verif";
                                        echo "<script>
                                            sessionStorage.setItem('status', 'succes_inscript');
                                            window.location.href = '../confirm.php?token=$token';
                                        </script>";
                                    }

                                    $mail->send();  
                                }else {
                                    echo "<script>
                                        sessionStorage.setItem('status', 'error_inattendu');
                                        window.location.href = '../inscription.php';
                                    </script>";
                                }
                            }catch (Exception $e) {

                                echo "<script>
                                    sessionStorage.setItem('status', 'error_send_mail');
                                    window.location.href = '../inscription.php';
                                </script>";
                            }
            
                        } else {
                            echo "<script>
                                    sessionStorage.setItem('status', 'error_inattendu');
                                    window.location.href = '../inscription.php';
                                </script>";
                        }
                    
                    }else {
                        echo "<script>
                                    sessionStorage.setItem('status', 'error_Condif_mdp');
                                    window.location.href = '../inscription.php';
                                </script>";
                    }
                }else {
                    echo "<script>
                            sessionStorage.setItem('status', 'error_email_occup');
                            window.location.href = '../inscription.php';
                        </script>";
                        echo 'email occuper';
                }

            }else {
                echo "<script>
                            sessionStorage.setItem('status', 'error_mdp1_2');
                            window.location.href = '../inscription.php';
                        </script>";
            }
        } else {
            $_SESSION['error'] = "Veuillez vérifier le reCAPTCHA.";
            echo "<script>
                        sessionStorage.setItem('status', 'error_recaptcha');
                        window.location.href = '../inscription.php';
                    </script>";
        }
    }else {
        header('Location: ../connexion.php');
    } 
?>