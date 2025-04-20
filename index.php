<?php 

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);


    $pages = ['accueil','admin', 'connexion', 'inscription', 'mdp_forget', 'confirm','deconnexion'];
    $page = isset($_GET['page']) ? $_GET['page'] : 'accueil';

    if (in_array($page, $pages)) {
        $fichier = "$page.php";

        if (file_exists($fichier)) {
            include_once $fichier;
        } else {
            http_response_code(404);
            include_once '404.php';
        }
    } else {
        http_response_code(404);
        include_once '404.php';
    }

?>