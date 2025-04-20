
<?php
    include('traitement/connect_BD.php');
    try {
        $stmt = $connect->prepare("SELECT * FROM banniere ORDER BY date_poster DESC");
        $stmt->execute();
        $bannieres = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    } catch (PDOException $e) {
        
        die("Erreur lors de la récupération des données : " . $e->getMessage());
    }
?>
    
        <section class="slick-slideshow">
        <?php foreach ($bannieres as $banniere): ?>
    <div class="slick-custom">
                <img src="images/slideshow/baniere/<?php echo htmlspecialchars($banniere['images_grd']); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($banniere['titre']); ?>">
                <div class="slick-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-10">
                                <h1 class="slick-title"><?php echo htmlspecialchars($banniere['titre']); ?></h1>
                                <p class="lead text-white mt-lg-3 mb-lg-5"><?php echo htmlspecialchars($banniere['ptte_descript']); ?></p>
                                <a href="detail_baniere.php?id=<?php echo htmlspecialchars($banniere['id']); ?>" class="btn custom-btn">Découvrir</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
</section>

