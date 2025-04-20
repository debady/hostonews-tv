<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire FAQ Santé</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }
        .form-container {
            background: #ffffff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .form-title {
            font-size: 1.5rem;
            color: #343a40;
            margin-bottom: 20px;
        }
        .form-label {
            font-weight: 600;
            color: #495057;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-container">
                    <h1 class="form-title">Ajouter une Question à la FAQ</h1>
                    <p style='color:green;'>
                        <?php
                        if(isset( $_SESSION['alerte'] )){
                            echo  $_SESSION['alerte'] ;
                            unset( $_SESSION['alerte'] );
                        }

                        ?>
                    </p>

                    <form action="trait_infos/trait_faqs.php" method="post">
                        <div class="mb-3">
                            <label for="category" class="form-label">Catégorie</label>
                            <select id="category" name="category" class="form-select" required>
                                <option value="Informations générales">Informations générales</option>
                                <option value="Services de santé">Services de santé</option>
                                <option value="Prévention des maladies">Prévention des maladies</option>
                                <option value="Santé mentale">Santé mentale</option>
                                <option value="Médecine générale">Médecine générale</option>
                                <option value="Nutrition et bien-être">Nutrition et bien-être</option>
                                <option value="Soins dentaires">Soins dentaires</option>
                                <option value="Pharmacie et médicaments">Pharmacie et médicaments</option>
                                <option value="Urgences médicales">Urgences médicales</option>
                                <option value="Suivi des maladies chroniques">Suivi des maladies chroniques</option>
                                <option value="Santé des femmes">Santé des femmes</option>
                                <option value="Santé des enfants">Santé des enfants</option>
                                <option value="Soins gériatriques">Soins gériatriques</option>
                                <option value="Recherches médicales">Recherches médicales</option>
                                <option value="Télémédecine">Télémédecine</option>
                            </select>

                        </div>

                        <div class="mb-3">
                            <label for="question" class="form-label">Question</label>
                            <textarea id="question" name="question" class="form-control" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="answer" class="form-label">Réponse</label>
                            <textarea id="answer" name="answer" class="form-control" rows="5" required></textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
