<?php
    $titre = 'Journal télévisé ';
    include('form_entete.php');
?>

        <form action="trait_infos/trait_journal.php" method="POST" enctype="multipart/form-data">
            <!-- Zone d'upload d'image -->
            <div class="form-group">
                <label>Bnaniere :</label>
                <div class="upload-container" onclick="document.getElementById('imageInput').click();">
                    <input type="file" name="miniature" id="imageInput" accept="image/*" required onchange="previewImage(event)">
                    <p>Cliquez ici ou glissez une image</p>
                    <img id="imagePreview" alt="Prévisualisation de l'image">
                </div>
            </div>

            <!-- Champ pour le titre -->
            <div class="form-group">
                <label for="titre">Titre :</label>
                <input type="text" name="titre" id="titre" maxlength="255" placeholder="Entrez le titre" required>
            </div>

            <!-- Champ pour la petite description -->
            <div class="form-group">
                <label for="petiteDescription">Petite Description :</label>
                <input type="text" name="petiteDescription" id="petiteDescription" maxlength="255" placeholder="Entrez une petite description" required>
            </div>

            <!-- Champ pour la grande description -->
            <div class="form-group">
                <label for="grandeDescription">Grande Description :</label>
                <textarea name="grandeDescription" id="grandeDescription" placeholder="Entrez une grande description" required></textarea>
            </div>
            
            <!-- Champ pour le url -->
            <div class="form-group">
                <label for="titre">ULR :</label>
                <input type="url" name="urls_video" id="titre" maxlength="255" placeholder="Entrez le url de la video" required>
            </div>

            <!-- Bouton de soumission -->
            <button type="submit" class="btn-submit">Ajouter la bannière</button>
        </form>
    </div>
<?php
    include('form_footer.php');
?>