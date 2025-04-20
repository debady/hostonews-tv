<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertion de Données dans la Table Replay</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input, textarea, button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .image-preview {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .image-preview img {
            max-width: 100%;
            max-height: 300px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Ajouter un Nouveau Replay</h1>
    <p>
        <?php 
        if( isset($_SESSION['alerte'])){
            echo  $_SESSION['alerte'];
            unset( $_SESSION['alerte']);
        }
        ?>
    </p>
    <form action="trait_infos/trait_replays.php" method="POST" enctype="multipart/form-data">
        <label for="video_url">URL de la Vidéo :</label>
        <input type="url" id="video_url" name="video_url" required><br><br>

        <label for="alert_label">Label d'Alerte :</label>
        <input type="text" id="alert_label" name="alert_label"><br><br>

        <!-- <label for="reaction_count">Nombre de Réactions :</label>
        <input type="number" id="reaction_count" name="reaction_count" value="0" min="0"><br><br> -->

        <label for="title">Titre :</label>
        <input type="text" id="title" name="title" required><br><br>

        <label for="description">Description :</label>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>

        <label for="recapitulatif">recapitulatif :</label>
        <textarea id="recapitulatif" name="recapitulatif" rows="4" cols="50" required></textarea><br><br>

        <label for="event_date">Date de l'Événement :</label>
        <input type="date" id="event_date" name="event_date" required><br><br>

        <label for="image">Télécharger une Image :</label>
        <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)"><br><br>

        <div class="image-preview" id="imagePreview">
            <img id="preview" src="" alt="Prévisualisation de l'image" style="display: none;">
        </div>

        <button type="submit">Ajouter</button>
    </form>

    <script>
        function previewImage(event) {
            const preview = document.getElementById('preview');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>
</html>
