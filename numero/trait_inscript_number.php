<?php 
    session_start();

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once 'vendor/autoload.php';

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    use Twilio\Rest\Client;

    include('../traitement/connect_BD.php');
    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $recup_numero = htmlspecialchars($_POST["numero"]);
        $var_acces_token = md5(15);

        $verification_code = rand(100000, 999999);
        if (!preg_match('/^\+\d{10,15}$/', $recup_numero)) {

            if(strlen($recup_numero) > 9){
                $recup_numeros = "SELECT numero FROM utilisateurs WHERE utilisateurs.numero = '$recup_numero' ";
                $resultats_verif_numero = $conn->query($recup_numeros);
    
                if($resultats_verif_numero->num_rows >0){
                    echo "<script>
                            sessionStorage.setItem('status', 'error_number_occup');
                            window.location.href = '../inscription_numb.php';
                        </script>";
    
                }else {
                    
                    $sql = "INSERT INTO utilisateurs (numero, verification_code, acces_token) VALUES ('$recup_numero','$verification_code','$var_acces_token')";
                    if ($conn->query($sql) === TRUE) {

                        $sid = $_ENV['TWILIO_SID'];
                        $token = $_ENV['TWILIO_TOKEN'];
                        $twilio_number = $_ENV['TWILIO_NUMBER'];
            
                        $client = new Client($sid, $token);
            
                        try {
                            $message = $client->messages->create(
                                $recup_numero, // Numéro du destinataire
                                options: array(
                                    'from' => $twilio_number,
                                    'body' => "Votre code de vérification est : $verification_code"
                                )
                            );
                            echo "<script>
                                    sessionStorage.setItem('status', 'code_send');
                                    window.location.href = '../confirm.php';
                                </script>";

                        } catch (Exception $e) {

                            // echo "Erreur lors de l'envoi du SMS : " . $e->getMessage();
                            echo "<script>
                                sessionStorage.setItem('status', 'error_send_sms');
                                window.location.href = '../inscription_numb.php';
                            </script>";
                        }
                    }else{
                        echo "<script>
                                sessionStorage.setItem('status', 'error_inattendu');
                                window.location.href = '../inscription_numb.php';
                            </script>";
                    }
                }
            }else {
                echo "<script>
                            sessionStorage.setItem('status', 'error_len_mdp');
                            window.location.href = '../inscription_numb.php';
                    </script>";
            }
        }else {
                echo "<script>
                sessionStorage.setItem('status', 'error_len_mdp');
                window.location.href = '../inscription_numb.php';
            </script>";
        }
    }else{
        header('Location: ../inscription_numb.php');
    }
?>