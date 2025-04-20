<?php

    //include('traitement/connect_BD.php');
    $categoriesStmt = $pdo->query("SELECT DISTINCT categorie FROM emissions LIMIT 3");
    $categories = $categoriesStmt->fetchAll(PDO::FETCH_COLUMN);

    $emissionsByCategory = [];
    foreach ($categories as $key => $categorie) {

        $limit = ($key === 0) ? 3 : 3;
        $stmt = $pdo->prepare("SELECT* FROM emissions WHERE categorie = :categorie ORDER BY RAND() LIMIT :limit");
        $stmt->bindParam(':categorie', $categorie, PDO::PARAM_STR);
        
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        $emissionsByCategory[$categorie] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

?>


            <section class="featured-product section-padding">
                <div class="container">
                    <div class="row">
                        <?php foreach ($emissionsByCategory as $categorie => $emissions): ?>
                            <div class="col-12 text-center">
                                <h2 class="mb-5"><?= htmlspecialchars($categorie) ?></h2>
                            </div>
                            <?php foreach ($emissions as $emission): ?>
                                <div class="col-lg-4 col-12 mb-3">
                                    <div class="product-thumb">
                                        <a href="detail_emission.php?id=<?= $emission['id'] ?>">
                                            <img src="images/slideshow/emission/<?= htmlspecialchars($emission['image1']) ?>" class="img-fluid product-image" alt="Image de l'émission">
                                        </a>
                                        <div class="product-info d-flex">
                                            <div>
                                                <h5 class="product-title mb-0">
                                                    <a href="detail_emission.php?id=<?= $emission['id'] ?>" class="product-title-link"><?= htmlspecialchars($emission['titre']) ?></a>
                                                </h5>
                                                <p class="product-p"><?= htmlspecialchars($emission['ptt_description']) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            <?php endforeach; ?>
                                <div class="col-12 text-center">
                                    <a href="category_emission.php?category=<?= htmlspecialchars($categorie) ?>" class="view-all">Voir Plus</a>
                                </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

