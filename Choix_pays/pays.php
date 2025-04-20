<?php
    if (isset($_POST['pays'])) {
        $pays = $_POST['pays'];
        setcookie('pays', $pays, time() + 365 * 24 * 60 * 60, '/');
    }

    header('Location: index.php');
    exit;
?>
