<?php
<<<<<<< HEAD
=======
    // require 'config.php';
>>>>>>> 240004f99927142e38f3b2bbab142d44f0fa5e6a
    //include('../traitement/connect_BD.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $token = $_POST['token'];
        $newPassword = sha1($_POST['password']);

        $stmt = $pdo->prepare('SELECT * FROM password_resets WHERE token = ?');
        $stmt->execute([$token]);
        $resetRequest = $stmt->fetch();

        if ($resetRequest) {
            $email = $resetRequest['email'];

            $stmt = $pdo->prepare('UPDATE administrateur SET mot_de_passe = ? WHERE email = ?');
            $stmt->execute([$newPassword, $email]);

            $stmt = $pdo->prepare('DELETE FROM password_resets WHERE email = ?');
            $stmt->execute([$email]);

            echo "<script>
                    window.location.href = '../connexion-admin.php?status=ok_new_mdp';
                </script>";

        } else {
            echo "<script>
                    window.location.href = '../new-mdp.php?status=jeton_onvalide';
                </script>";
        }
    }else {
        header('Locatin: connexion-admin.php');
    }
?>