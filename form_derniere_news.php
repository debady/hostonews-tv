<?php session_start();?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Actualité Santé</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }

        .form-section {
            padding: 50px 0;
        }

        .form-section .form-control {
            border-radius: 10px;
        }

        .form-section h2 {
            font-size: 2rem;
            color: #343a40;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 50px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .container {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
    </style>
</head>
<body>
<section class="form-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="mb-5">Ajouter une Actualité Santé</h2>
                <p>
            <?php 
            if( isset($_SESSION['alerte'])){
                echo  $_SESSION['alerte'];
                unset( $_SESSION['alerte']);
            }
            ?>

        </p>
            </div>
            <div class="col-lg-8 col-12 mx-auto">
                <form action="trait_infos/dernire_news.php" method="POST">
                    <div class="mb-3">
                        <label for="title" class="form-label">Titre</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Titre de l'actualité" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="5" placeholder="Description complète" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Catégorie</label>
                        <select class="form-control" id="category" name="category" required>
                            <option value="À la une">À la une</option>
                            <option value="Conseils Pratiques">Conseils Pratiques</option>
                            <option value="Prévention">Prévention</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image_url" class="form-label">URL de l'image</label>
                        <input type="text" class="form-control" id="image_url" name="image_url" placeholder="Lien vers une image (facultatif)">
                    </div>
                    <div class="mb-3">
                        <label for="video_url" class="form-label">URL de la Vidéo</label>
                        <input type="text" class="form-control" id="video_url" name="video_url" placeholder="Lien vers une vidéo (facultatif)">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Ajouter l'actualité</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
