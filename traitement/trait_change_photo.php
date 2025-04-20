<?php

    session_start();
    include('connect_BD.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        if($_FILES['new_torf'] != $_SESSION['photo_profil']){
            $recup_photo = $_FILES['new_torf'];
            $renome = $_SESSION['acces_token']."_".($_SESSION['id']+7349).'.png';
    
            $chemin = 'C:/wamp64/www/HostoTV/images/Peoples/'.$renome;
            $insert = $varConnectBD->prepare('UPDATE utilisateurs SET photo_profil=? WHERE utilisateurs.id=?');
            $insert->execute(array($renome,$_SESSION['id']));
            
            move_uploaded_file($recup_photo['tmp_name'],$chemin);
            $_SESSION['photo_profil'] = $renome;

            $token = $_SESSION['token'] ;
            $acces_token = $_SESSION['acces_token'] ;

            echo "<script>
                    sessionStorage.setItem('status', 'change_photo_succes');
                    window.location.href = '../profile.php?token=$token&acces_token=$acces_token';
                </script>";
        }
        else {
            $_SESSION['photo_profil'] = $renome;
            header('location:../profile.php?token='.$_SESSION['token']."&acces_token=".$_SESSION['acces_token']);
        }
    }else {
        header('Location: ../connexion.php');
    } 
?>