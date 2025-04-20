<?php
    include 'connexion.php';

    $pays = isset($_COOKIE['pays']) ? $_COOKIE['pays'] : 'cote_divoire';
    $stmt = $pdo->prepare("SELECT * FROM informations WHERE pays = ?");

    $stmt->execute([$pays]);
    $informations = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations Santé</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Informations Santé</h1>
        <form action="pays.php" method="POST"> 
            <label for="pays">Choisissez un pays :</label>
            <select name="pays" id="pays">
                <option value="cote_divoire" <?= $pays === 'cote_divoire' ? 'selected' : '' ?>>Côte d’Ivoire</option>
                <option value="senegal" <?= $pays === 'senegal' ? 'selected' : '' ?>>Sénégal</option>
                <option value="mali" <?= $pays === 'mali' ? 'selected' : '' ?>>Mali</option>
            </select>
            <button type="submit">Valider</button> 

        </form>
    </header>

    <main>
    <div id="country-info"><!-- Les informations du pays seront chargées ici -->
        <h2>Bienvenue en Côte d'Ivoire</h2>
        <p>Voici les conseils santé pour les habitants de la Côte d'Ivoire.</p>
    </div>


        <!-- Afficher les informations dynamiques -->
        <?php if ($informations): ?>
            <?php foreach ($informations as $info): ?>
                <h2><?= htmlspecialchars($info['titre']) ?></h2>
                <p><?= htmlspecialchars($info['contenu']) ?></p>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucune information disponible pour ce pays.</p>
        <?php endif; ?>
    </main>
</body>
</html>
