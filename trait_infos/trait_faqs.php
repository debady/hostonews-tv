<?php
    session_start();
    include("../traitement/connect_BD.php");
    // Vérifier si le formulaire a été soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer les données du formulaire
        $category = htmlspecialchars($_POST['category']);
        $question = htmlspecialchars($_POST['question']);
        $answer = htmlspecialchars($_POST['answer']);

        // Valider les données
        if (!empty($category) && !empty($question) && !empty($answer)) {
            try {
                // Préparer la requête d'insertion
                $sql = "INSERT INTO faq (category, question, answer) VALUES (:category, :question, :answer)";
                $stmt = $pdo->prepare($sql);

                // Lier les paramètres
                $stmt->bindParam(':category', $category);
                $stmt->bindParam(':question', $question);
                $stmt->bindParam(':answer', $answer);

                // Exécuter la requête
                $stmt->execute();

                // Message de confirmation
                $_SESSION['alerte'] = "<div class='alert alert-success'>La question a été ajoutée avec succès !</div>";
                header('Location: ../form_faqs.php');
            } catch (PDOException $e) {
                $_SESSION['alerte'] = "<div class='alert alert-danger'>Erreur lors de l'insertion : " . $e->getMessage() . "</div>";
                header('Location: ../form_faqs.php');
            }
        } else {
            $_SESSION['alerte'] = "<div class='alert alert-warning'>Veuillez remplir tous les champs.</div>";
            header('Location: ../form_faqs.php');
        }
    }
?>
