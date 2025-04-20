<?php 
    session_start();
    include('connect_BD.php');

    $insert = $varConnectBD->prepare('UPDATE utilisateurs SET status="deconnecté" WHERE utilisateurs.id=?');
    $insert->execute(array($_SESSION['id']));

    session_destroy();
    header('Location:../index.php');
?>