<?php

    session_start();
    //include('connect_BD.php');

    $requet = $varConnectBD->prepare('SELECT resset_token FROM utilisateurs WHERE resset_token = ?');
    $requet->execute(array($_GET['token']));

    if($requet->rowCount() > 0){
        
        $confirm = $varConnectBD->prepare('UPDATE utilisateurs SET is_verified = ? WHERE resset_token = ?');
        $confirm->execute(array(1,$_GET['token']));

        echo "<script>
                sessionStorage.setItem('status', 'compte_verif');
                window.location.href = '../connexion.php';
            </script>";

    }else {

        $_SESSION['confirme_mail'] = TRUE;
        echo "<script>
                sessionStorage.setItem('status', 'lien_error');
                window.location.href = '../after_email.php';
            </script>";
    }
?>