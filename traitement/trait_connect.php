<?php 
    session_start();
    include("connect_BD.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(!empty($_POST['email_connect'])){

            if(!empty($_POST['mdp_connect'])){

                $var_recup_email_connect = htmlspecialchars($_POST['email_connect']);
                $var_recup_mdp_connect = sha1($_POST['mdp_connect']);

                $request = "SELECT * FROM utilisateurs WHERE email='$var_recup_email_connect' AND mot_de_passe = '$var_recup_mdp_connect'";
                $reponses_request = $conn->query($request);

                if($reponses_request->num_rows > 0){

                    $si_verif = $varConnectBD->prepare('SELECT email FROM utilisateurs WHERE email=? AND is_verified =?');
                    $si_verif->execute(array($var_recup_email_connect,1));

                    if($si_verif->rowCount() == 1){

                        $take_info = $reponses_request->fetch_assoc();

                        $_SESSION['connecter'] = TRUE; // se baser dessus pour les verification de connecter
                        $_SESSION['compte_trouver'] =TRUE; // se baser dessus pour verifier que le compte existe a faire

                        $_SESSION['id'] =$take_info['id'];
                        $_SESSION['nom_prenom'] =$take_info['nom_prenom'];
                        $_SESSION['email'] =$take_info['email'];

                        $_SESSION['numero'] =$take_info['numero'];
                        $_SESSION['pays'] =$take_info['pays'];

                        $_SESSION['photo_profil'] =$take_info['photo_profil'];
                        $_SESSION['date_inscription'] =$take_info['date_inscription'];

                        $_SESSION['acces_token'] =$take_info['acces_token'];
                        $_SESSION['resset_token'] =$take_info['resset_token'];
                        $_SESSION['token'] = md5(10);

                        $insert = $varConnectBD->prepare('UPDATE utilisateurs SET status="Connecté" WHERE utilisateurs.id=?');
                        $insert->execute(array($_SESSION['id']));

                        header('location:../accueil.php?token='.$_SESSION['token']."&acces_token=".$_SESSION['acces_token']."&recette_token=".$_SESSION['resset_token']);
                    }else{
                        echo "<script>
                                sessionStorage.setItem('status', 'error_non_confirm');
                                window.location.href = '../confirm.php';
                            </script>";
                    }
                        
                }else {
                    echo "<script>
                                sessionStorage.setItem('status', 'error_coordonnes');
                                window.location.href = '../connexion.php';
                            </script>";
                }
            }else {
                echo "<script>
                    sessionStorage.setItem('status', 'error_champs_vide');
                    window.location.href = '../connexion.php';
                </script>";
            }
        }else {
            echo "<script>
                    sessionStorage.setItem('status', 'error_champs_vide');
                    window.location.href = '../connexion.php';
                </script>";
        }
    }else {
        header('Location:../connexion.php');
    }
?>