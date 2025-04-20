<?php
    session_start();
    //include('connect_BD.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if($_POST['new_nom'] != $_SESSION['nom_prenom']){
            $recup_new_nom =htmlspecialchars($_POST["new_nom"]);
        
        }else {
            $recup_new_nom =$_SESSION["nom_prenom"];
        }
        $_SESSION['nom_prenom'] = $recup_new_nom;

        // -----------------------------------------

        if($_POST['new_email'] != $_SESSION['email']){
            $recup_new_email =htmlspecialchars($_POST["new_email"]);
        
        }else {
            $recup_new_email =$_SESSION["email"];
        }
        $_SESSION['email'] = $recup_new_email;

        // -----------------------------------------

        if($_POST['new_numero'] != $_SESSION['numero']){
            $recup_new_numero =htmlspecialchars($_POST["new_numero"]);
        
        }else {
            $recup_new_numero =$_SESSION["numero"];
        }
        $_SESSION['numero'] = $recup_new_numero;

        // -----------------------------------------

        if($_POST['new_pays'] != $_SESSION['pays']){
            $recup_new_pays =htmlspecialchars($_POST["new_pays"]);
        
        }else {
            $recup_new_pays =$_SESSION["pays"];
        }
        $_SESSION['pays'] = $recup_new_pays;

        // ----------------------------------------

        $insert = $varConnectBD->prepare('UPDATE utilisateurs SET nom_prenom=?, email=?, numero=?, pays=? WHERE utilisateurs.id=?');
        $insert->execute(array($recup_new_nom,$recup_new_email,$recup_new_numero,$recup_new_pays,$_SESSION['id']));

        echo "<script>
                sessionStorage.setItem('status', 'modif_succes');
                window.location.href = '../profile.php?token=$token&acces_token=$acces_token';
            </script>";

    } else {
        header('location:../connexion');
    } 
?>