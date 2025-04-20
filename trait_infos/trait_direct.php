<?php 
    // session_start();
    // include('../traitement/connect_BD.php');

    // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //     $urls_video = htmlspecialchars($_POST['urls_video']);

    //     // Traitement de l'image
    //     if (isset($_FILES['le_baniere']) && $_FILES['le_baniere']['error'] === UPLOAD_ERR_OK) {
    //         $image_tmp = $_FILES['le_baniere']['tmp_name'];
    //         $image_name = uniqid() . '-' . basename($_FILES['le_baniere']['name']);
    //         $image_path = "../images/direct/" . $image_name;

    //         // Vérification de l'existence du dossier
    //         if (!file_exists('../images/direct')) {
    //             mkdir('../images/direct', 0777, true);
    //         }

    //         // Déplacer l'image
    //         if (!move_uploaded_file($image_tmp, $image_path)) {
    //             die("Erreur lors du téléchargement de l'image.");
    //         }
    //     } else {
    //         // Si aucune image n'est téléchargée, récupérer l'image existante
    //         $stmt = $conn->prepare("SELECT baniere FROM direct LIMIT 1");
    //         $stmt->execute();
    //         $result = $stmt->fetch(PDO::FETCH_ASSOC);

    //         if ($result) {
    //             $image_name = $result['baniere']; 
    //         } else {
    //             die("Aucune image précédente trouvée et aucune nouvelle image fournie.");
    //         }
    //     }

    //     // Mise à jour des données dans la base
    //     $sql = "UPDATE direct 
    //     SET baniere = :le_baniere, urls = :urls_video 
    //     WHERE id = 1";

    //     $stmt = $conn->prepare($sql);

    //     try {
    //         $stmt->execute([
    //             ':le_baniere' => $image_name,
    //             ':urls_video' => $urls_video,
    //         ]);

    //         $_SESSION['alerte'] = "Les informations ont été mises à jour avec succès !";
    //         header('Location:../form_direct.php');
    //         exit;
    //     } catch (PDOException $e) {
    //         die("Erreur lors de la mise à jour des données : " . $e->getMessage());
    //     }
    // } else {
    //     echo "Aucune donnée reçue.";
    // }
?>

<?php 
    session_start();

    // Connexion à la base de données avec PDO
    try {
        $host = 'localhost'; // Remplacez par le nom de votre serveur
        $dbname = 'bd_hostonews_tv'; // Remplacez par le nom de votre base de données
        $username = 'root'; // Remplacez par votre nom d'utilisateur
        $password = ''; // Remplacez par votre mot de passe

        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $urls_video = htmlspecialchars($_POST['urls_video']);

        // Traitement de l'image
        if (isset($_FILES['le_baniere']) && $_FILES['le_baniere']['error'] === UPLOAD_ERR_OK) {
            $image_tmp = $_FILES['le_baniere']['tmp_name'];
            $image_name = uniqid() . '-' . basename($_FILES['le_baniere']['name']);
            $image_path = "../images/direct/" . $image_name;

            // Vérification de l'existence du dossier
            if (!file_exists('../images/direct')) {
                mkdir('../images/direct', 0777, true);
            }

            // Déplacer l'image
            if (!move_uploaded_file($image_tmp, $image_path)) {
                die("Erreur lors du téléchargement de l'image.");
            }
        } else {
            // Si aucune image n'est téléchargée, récupérer l'image existante
            $stmt = $conn->prepare("SELECT baniere FROM direct LIMIT 1");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                $image_name = $result['baniere']; 
            } else {
                die("Aucune image précédente trouvée et aucune nouvelle image fournie.");
            }
        }

        try {
            // Récupérer les anciennes données pour les sauvegarder dans la table `replay`
            $stmt = $conn->prepare("SELECT * FROM direct WHERE id = 1");
            $stmt->execute();
            $oldData = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($oldData) {
                // Insérer les données dans `replay`
                $sqlInsertReplay = "
                    INSERT INTO replay (image_path, video_url, title, description, event_date, reaction_count)
                    VALUES (:image_path, :video_url, :title, :description, :event_date, :reaction_count)
                ";

                $stmtReplay = $conn->prepare($sqlInsertReplay);
                $stmtReplay->execute([
                    ':image_path' => $oldData['baniere'],
                    ':video_url' => $oldData['urls'],
                    ':title' => 'Titre par défaut', // À remplacer par une valeur réelle
                    ':description' => 'Description par défaut', // À remplacer par une valeur réelle
                    ':event_date' => date('Y-m-d'), // Date actuelle
                    ':reaction_count' => $oldData['reaction'] ?? 0
                ]);
            }

            // Mise à jour des données dans la table `direct`
            $sqlUpdateDirect = "
                UPDATE direct 
                SET baniere = :le_baniere, urls = :urls_video 
                WHERE id = 1
            ";

            $stmtUpdate = $conn->prepare($sqlUpdateDirect);
            $stmtUpdate->execute([
                ':le_baniere' => $image_name,
                ':urls_video' => $urls_video,
            ]);

            $_SESSION['alerte'] = "Les informations ont été mises à jour avec succès !";
            header('Location:../form_direct.php');
            exit;
        } catch (PDOException $e) {
            die("Erreur : " . $e->getMessage());
        }
    } else {
        echo "Aucune donnée reçue.";
    }
?>

