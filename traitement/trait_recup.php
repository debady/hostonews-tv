<?php
    session_start();
    //include('connect_BD.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if(!empty($_POST['email_recup'] )){
            $recup_new_email =htmlspecialchars($_POST["email_recup"]);

            $verif = $varConnectBD->prepare('SELECT email FROM utilisateurs WHERE utilisateurs.email=?');
            $verif->execute(array($recup_new_email));

            if($verif->rowCount()>0){

                $_SESSION['compte_trouver'] =TRUE;
                $_SESSION['email_recup'] = $recup_new_email;

                $_SESSION['token'] = bin2hex(random_bytes(50));
                header('Location: ../resset/send_reset_link.php?token='.$_SESSION['token']);
                
            }else { 
                echo "<script>
                            sessionStorage.setItem('status', 'error_email_recup');
                            window.location.href = '../mdp_forget.php';
                        </script>";
            }        
        }else {
            echo "<script>
                    sessionStorage.setItem('status', 'error_email_empty');
                    window.location.href = '../mdp_forget.php';
                </script>";
        }
    } else {
        header('location:../mdp_forget.php');
    }
?>