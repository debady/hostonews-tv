<?php 
    if( isset($_SESSION['token'])){
        header('location:profile.php?token='.$_SESSION['token']."&acces_token=".$_SESSION['acces_token']);
    }
?>