<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $id_users = isset($_POST['id_users']) ? $_POST['id_users'] : 1000;
        $nom_prenom = isset($_POST['nom_prenom']) ? $_POST['nom_prenom'] : 'Anonyme';
        $photo_profil = isset($_POST['photo_profil']) ? $_POST['photo_profil'] : 'default1.png';
        $id_video = isset($_POST['id_video']) ? $_POST['id_video'] : null;
        $comment = isset($_POST['comment']) ? $_POST['comment'] : '';

        $host = 'localhost';
        $db = 'bd_hostonews_tv';
        $user = 'root';
        $pass = '';

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Préparer la requête d'insertion
            $sql = "INSERT INTO commentaires (nom_prenom, photo, utilisateur_id, id_direct, commentaire)
                    VALUES (:nom_prenom, :photo, :utilisateur_id, :id_direct, :commentaire)";
            
            $stmt = $pdo->prepare($sql);
            
            // Lier les paramètres
            $stmt->bindParam(':nom_prenom', $nom_prenom);
            $stmt->bindParam(':photo', $photo_profil);
            $stmt->bindParam(':utilisateur_id', $id_users, PDO::PARAM_INT);
            $stmt->bindParam(':id_direct', $id_video, PDO::PARAM_INT);
            $stmt->bindParam(':commentaire', $comment);

            $stmt->execute();

            // echo "Commentaire ajouté avec succès!";
            // echo "<script>
            //     Swal.fire({
            //         icon: 'info',
            //         title: 'En attente',
            //         text: 'La table journauxtelevises est vide pour le moment.',
            //         timer: 3000,
            //         showConfirmButton: false
            //     });
            // </script>";

            echo "<script>
                    sessionStorage.setItem('status', 'succes_comment');
                    window.location.href = '../detail_replay.php?id=$id_video';
                </script>";

        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
?>
