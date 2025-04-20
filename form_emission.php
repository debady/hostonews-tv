<?php session_start();?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Insertion des Émissions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }

        input, textarea, select, button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #28a745;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        .image-preview {
            max-width: 100%;
            margin-top: 10px;
        }
    </style>
    <script>
        function previewImage(event, previewId) {
            const preview = document.getElementById(previewId);
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
</head>
<body>
    <h1>
        Insertion de données dans la table "emissions" 
        <br>
        <p>
            <?php 
            if( isset($_SESSION['alerte'])){
                echo  $_SESSION['alerte'];
                unset( $_SESSION['alerte']);
            }
            ?>

        </p>
    </h1>

    <form action="trait_infos/trait_emission.php" method="POST" enctype="multipart/form-data">
        
        <label for="Urls">Urls:</label>
        <input type="url" id="Urls" name="Urls" required>
        
        <label for="titre">Titre:</label>
        <input type="text" id="titre" name="titre" required>

        <label for="le_status">le_status:</label>
        <input type="text" id="le_status" name="le_status" required>

        <label for="ptt_description">Petite Description:</label>
        <textarea id="ptt_description" name="ptt_description"></textarea>

        <label for="grd_description">Grande Description:</label>
        <textarea id="grd_description" name="grd_description"></textarea>

        <label for="episode">Épisode:</label>
        <select id="episode" name="episode">
            <option value="">-- Sélectionnez un épisode --</option>
            <!-- Générer les options pour les épisodes de 1 à 100 -->
            <script>
                for (let i = 1; i <= 100; i++) {
                    document.write(`<option value="${i}">${i}</option>`);
                }
            </script>
        </select>

        <label for="image1">Image 1:</label>
        <input type="file" id="image1" name="image1" accept="image/*" onchange="previewImage(event, 'preview1')">
        <img id="preview1" class="image-preview" alt="Aperçu de l'image 1">

        <label for="image2">Image 2:</label>
        <input type="file" id="image2" name="image2" accept="image/*" onchange="previewImage(event, 'preview2')">
        <img id="preview2" class="image-preview" alt="Aperçu de l'image 2">

        <label for="categorie">Catégorie:</label>
        <select id="categorie" name="categorie">
            <option value="">-- Sélectionnez une catégorie --</option>
            <option value="Documentaire">Documentaire</option>
            <option value="Divertissement">Divertissement</option>
            <option value="Actualités">Actualités</option>
            <option value="Sport">Sport</option>
        </select>
        <input type="text" id="categorie_manuel" name="categorie_manuel" placeholder="Ou saisissez une nouvelle catégorie">

        <button type="submit">Insérer</button>
    </form>
</body>
</html>