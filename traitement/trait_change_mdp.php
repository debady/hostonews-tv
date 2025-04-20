<?php
    // le script pour modifier le mot de passe quand connecter
    session_start();
    //include('connect_BD.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


        if(!empty($_POST['new_mdp1'] ) and !empty($_POST['new_mdp2'] ) ){            

            if($_POST['new_mdp1'] == $_POST['new_mdp2']){
                
                $recup_mdp1 = $_POST['new_mdp1'];
                $recup_mdp2 = $_POST['new_mdp2'];
                if(strlen($recup_mdp1) >= 8 && 

                    preg_match('/[a-z]/', $recup_mdp1) &&             
                    preg_match('/[A-Z]/', $recup_mdp1) && 

                    preg_match('/[0-9]/', $recup_mdp2) &&            
                    preg_match('/[\W]/', $recup_mdp2) ){

                    $recup_new_new_mdp2 =sha1($_POST["new_mdp2"]);
                    $insert = $varConnectBD->prepare('UPDATE utilisateurs SET mot_de_passe=? WHERE utilisateurs.resset_token=?');
                    
                    if($_POST['connecter_non_connecter'] == 'connetcer'){
                        $insert->execute(array($recup_new_new_mdp2, $_SESSION['resset_token']));

                        echo "<script>
                                sessionStorage.setItem('status', 'mdp_change');
                                window.location.href = '../profile.php';
                            </script>";

                    }else {
                        $insert->execute(array($recup_new_new_mdp2, $_GET['token'] ));
                        session_destroy();
                        echo "<script>
                                sessionStorage.setItem('status', 'mdp_change');
                                window.location.href = '../connexion.php';
                            </script>";
                    }

                }else {
                    $token = $_SESSION['token'];
                    echo "<script>
                            sessionStorage.setItem('status', 'error_mdp_condif');
                            window.location.href = '../new_mdp.php?token=$token';
                        </script>";
                }

            }else{
                $token = $_SESSION['token'];
                echo "<script>
                            sessionStorage.setItem('status', 'error_mdp1_2');
                            window.location.href = '../new_mdp.php?token=$token';
                        </script>";
            }
        }else {
            $token = $_SESSION['token'];
            echo "<script>
                sessionStorage.setItem('status', 'error_mdp_empty');
                window.location.href = '../new_mdp.php?token=$token';
            </script>"; 
        }

    } else {

       header('Location:../mdp_forgerT.php');
    }
?>