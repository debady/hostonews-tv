<?php
    $titre = 'Gestion des Bannières ';
    include('form_entete.php');
?>
        <form action="trait_infos/trait_insert_banniere.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Image Grande :</label>
                <div class="upload-container" onclick="document.getElementById('imageInput').click();">
                    <input type="file" name="images_grd" id="imageInput" accept="image/*" required onchange="previewImage(event)">
                    <p>Cliquez ici ou glissez une image</p>
                    <img id="imagePreview" alt="Prévisualisation de l'image">
                </div>
            </div>
            
            <div class="form-group">
                <label for="titre">Titre :</label>
                <input type="text" name="titre" id="titre" maxlength="255" placeholder="Entrez le titre" required>
            </div>

            <div class="form-group">
                <label for="ptte_descript">Petite Description :</label>
                <input type="text" name="ptte_descript" id="ptte_descript" maxlength="255" placeholder="Entrez une petite description" required>
            </div>

            <div class="form-group">
                <label for="grde_descript">Grande Description :</label>
                <textarea name="grde_descript" id="grde_descript" placeholder="Entrez une grande description" required></textarea>
            </div>

            <button type="submit" class="btn-submit">Ajouter la bannière</button>
        </form>
    </div>

<?php
    include('form_footer.php');
?>