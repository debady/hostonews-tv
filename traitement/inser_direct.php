<?php
session_start();


    // try {
    //     $conn = new PDO("mysql:host=localhost;dbname=bd_hostonews_tv;charset=utf8mb4", "root", ""); // Remplacez root et '' par vos identifiants
    //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // } catch (PDOException $e) {
    //     die("Erreur de connexion à la base de données : " . $e->getMessage());
    // }

    // if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //     // Récupérer les données du formulaire
    //     $urls_video = htmlspecialchars($_POST['urls_video']);


    //     // Gestion de l'upload de l'image
    //     if (isset($_FILES['le_baniere']) && $_FILES['le_baniere']['error'] === UPLOAD_ERR_OK) {
    //         $image_tmp = $_FILES['le_baniere']['tmp_name'];
    //         $image_name = uniqid() . '-' . basename($_FILES['le_baniere']['name']);
    //         $image_path = "direct/" . $image_name;

    //         if (!file_exists('direct')) {
    //             mkdir('direct', 0777, true);
    //         }

    //         if (!move_uploaded_file($image_tmp, $image_path)) {
    //             die("Erreur lors du téléchargement de l'image.");
    //         }
    //     } else {
    //         die("Erreur lors de l'upload de l'image.");
    //     }

    //     $sql = "INSERT INTO direct (baniere, urls) 
    //             VALUES (:le_baniere, :urls_video)";

    //     $stmt = $conn->prepare($sql);

    //     try {
    //         // Exécuter la requête avec les données
    //         $stmt->execute([
    //             ':le_baniere' => $image_path,
    //             ':urls_video' => $urls_video,

    //             ]);

    //         $_SESSION['alerte'] = "direct ajoutée avec succès !";
    //         header('Location:../form_direct.php');
            
    //     } catch (PDOException $e) {
    //         die("Erreur lors de l'insertion des données : " . $e->getMessage());
    //     }
    // } else {
    //     echo "Aucune donnée reçue.";
    // }

    ?>