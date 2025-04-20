<?php
    $titre = 'Live';
    include('form_entete.php');
?>

        <form action="trait_infos/trait_direct.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Bnaniere :</label>
                <div class="upload-container" onclick="document.getElementById('imageInput').click();">
                    <input type="file" name="le_baniere" id="imageInput" accept="image/*" required onchange="previewImage(event)">
                    <p>Cliquez ici ou glissez une image</p>
                    <img id="imagePreview" alt="Prévisualisation de l'image">
                </div>
            </div>
            
            <div class="form-group">
                <label for="titre">ULR :</label>
                <input type="url" name="urls_video" id="titre" maxlength="255" placeholder="Entrez le url de la video" required>
            </div>

            <button type="submit" class="btn-submit">Ajouter la bannière</button>
        </form>
    </div>
<?php
    include('form_footer.php');
?>