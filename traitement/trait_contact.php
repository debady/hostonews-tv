<?php 
    include('connect_BD.php');
    $host = 'localhost'; 
    $dbname = 'votre_base_de_donnees'; 
    $username = 'votre_utilisateur'; 
    $password = 'votre_mot_de_passe'; 

    // try {
        
    //     $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // } catch (PDOException $e) {
    //     die("Erreur de connexion : " . $e->getMessage());
    // }

    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $subject = filter_input(INPUT_POST, 'subject');
        $message = filter_input(INPUT_POST, 'message');

        
        if ($name && $email && $subject && $message) {
            try {
                
                $stmt = $pdo->prepare("INSERT INTO contact_form (name, email, subject, message) VALUES (:name, :email, :subject, :message)");

                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':subject', $subject);
                $stmt->bindParam(':message', $message);

                $stmt->execute();

                echo "<script>
                        sessionStorage.setItem('status', 'succes_contact');
                        window.location.href = '../contact.php';
                    </script>";
            } catch (PDOException $e) {

                echo "<script>
                        sessionStorage.setItem('status', 'error_contact_envoi');
                        window.location.href = '../contact.php';
                    </script>";

            }
        } else {
            echo "<script>
                        sessionStorage.setItem('status', 'error_contact_champ');
                        window.location.href = '../contact.php';
                    </script>";
        }
    }
?>