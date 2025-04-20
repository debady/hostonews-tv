<?php
    session_start();
    include('connect_BD.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $verification_code = $_POST['verification_code'];

        $stmt = $conn->prepare("SELECT id FROM utilisateurs WHERE verification_code = ? AND is_verified = 0");
        $stmt->bind_param("s", $verification_code);

        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            
            $stmt = $conn->prepare("UPDATE utilisateurs SET is_verified = 1 WHERE verification_code = ?");
            $stmt->bind_param("s", $verification_code);

            if ($stmt->execute()) {
                echo "<script>
                        sessionStorage.setItem('status', 'compte_verif');
                        window.location.href = '../connexion.php';
                    </script>";

            } else {

                echo "<script>
                            sessionStorage.setItem('status', 'error_code_verif');
                            window.location.href = '../confirm.php';
                        </script>"; 
            }
        } else {
            echo "<script>
                        sessionStorage.setItem('status', 'error_code_verif');
                        window.location.href = '../confirm.php';
                    </script>";
        }
    }else {
        header('Location: ../connexion.php');
    } 
?>
