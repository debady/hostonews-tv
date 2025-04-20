<?php
    session_start();
    //include('../traitement/connect_BD.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $titre = htmlspecialchars($_POST['titre']);
        $ptte_descript = htmlspecialchars($_POST['ptte_descript']);
        $grde_descript = htmlspecialchars($_POST['grde_descript']);

        if (isset($_FILES['images_grd']) && $_FILES['images_grd']['error'] === UPLOAD_ERR_OK) {
            $image_tmp = $_FILES['images_grd']['tmp_name'];

            $image_name = uniqid() . '-' . basename($_FILES['images_grd']['name']);
            $image_path = "../images/slideshow/baniere/" . $image_name;
        
            if (!file_exists('../images/slideshow/baniere')) {
                mkdir('../images/slideshow/baniere', 0777, true);
            }

            if (!move_uploaded_file($image_tmp, $image_path)) {
                die("Erreur lors du téléchargement de l'image.");
            }
        } else {
            die("Erreur lors de l'upload de l'image.");
        }
    
        $sql = "INSERT INTO banniere (images_grd, titre, ptte_descript, grde_descript) 
                VALUES (:images_grd, :titre, :ptte_descript, :grde_descript)";

        $stmt = $connect->prepare($sql);
        try {

            $stmt->execute([
                ':images_grd' => $image_name,
                ':titre' => $titre,
                
                ':ptte_descript' => $ptte_descript,
                ':grde_descript' => $grde_descript,
                ]);

            $_SESSION['alerte'] ="<p style='color:green;'>". 'Bannière ajoutée avec succès !'. "</p>";
            header('Location:../form_baniere.php');
            
        } catch (PDOException $e) {
            die("Erreur lors de l'insertion des données : " . $e->getMessage());
        }
    } else {
        echo "Aucune donnée reçue.";
    }
?>
