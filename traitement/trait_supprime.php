<?php 
    session_start();
    //include('connect_BD.php');
    
    $suprimm = $varConnectBD->prepare("DELETE FROM utilisateurs WHERE utilisateurs.id = ?");
    $suprimm->execute(array($_SESSION['id']));

    session_destroy();
    session_start();

    $_SESSION['alerte'] = "Navré de vous voir partie !";
    header("Location:../programme.php");
 ?>