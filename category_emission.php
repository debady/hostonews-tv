<?php
    $titre_appli ="Session ".$_GET['category'] ; 
    include('entete1.php');
    include('entete2.php');

    // Connexion à la base de données
    $pdo = new PDO('mysql:host=localhost;dbname=bd_hostonews_tv', 'root', '');
    
    // Récupérer la catégorie depuis l'URL
    $categorie = isset($_GET['category']) ? htmlspecialchars($_GET['category']) : null;
    
    if ($categorie) {
        // Requête pour récupérer les données selon la catégorie
        $stmt = $pdo->prepare("SELECT * FROM emissions WHERE categorie = :categorie ORDER BY datePublication DESC");
        $stmt->execute(['categorie' => $categorie]);
        $emissions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $emissions = [];
    }
?>
    

    <section class="featured-product section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="mb-5"><?php echo htmlspecialchars($categorie); ?></h2>
                </div>

                <?php if (!empty($emissions)): ?>
                    <?php foreach ($emissions as $emission): ?>
                        <div class="col-lg-4 col-12 mb-3">
                            <div class="product-thumb">
                                <a href="detail_emission.php?id=<?php echo $emission['id']; ?>">
                                    <img src="images/slideshow/emission/<?php echo htmlspecialchars($emission['image1']); ?>" 
                                        class="img-fluid product-image" 
                                        alt="Image de l'émission">
                                </a>
                                <div class="product-info d-flex">
                                    <div>
                                        <h5 class="product-title mb-0">
                                            <a href="detail_emission.php?id=<?php echo $emission['id']; ?>" 
                                            class="product-title-link"><?php echo htmlspecialchars($emission['titre']); ?></a>
                                        </h5>
                                        <p class="product-p">
                                            <?php echo htmlspecialchars($emission['ptt_description']); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12 text-center">
                         <script>
                            Swal.fire({
                                title: "Erreur !",
                                text: "Aucune émission trouvée pour cette catégorie",
                                icon: "error",
                                confirmButtonText: "Ok !"
                            });
                         </script>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>


<?php include('footer.php');?>