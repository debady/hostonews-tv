<?php 

    //include('traitement/connect_BD.php');
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = intval($_GET['id']);

        $stmt = $pdo->prepare("SELECT * FROM banniere WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $baniere = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$baniere) {
            header('Location:index.php');
        }
    } else {
        // die("ID invalide.");
        header('Location:index.php');
    }

    $titre_appli = htmlspecialchars($baniere['titre']) ;
    include('entete1.php');
    include('entete2.php');
?>

            <section class="slick-slideshow">
                    <div class="slick-custom">
                        <img src="images/slideshow/baniere/<?= htmlspecialchars($baniere['images_grd']) ?>" class="img-fluid" alt="<?= htmlspecialchars($baniere['titre']) ?>">
                        <div class="slick-bottom">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 col-10">
                                        <h1 class="slick-title"><?= htmlspecialchars($baniere['titre']) ?></h1>
                                        <p class="lead text-white mt-lg-3 mb-lg-5"><?= htmlspecialchars($baniere['ptte_descript']) ?></p>
                                        <a href="detail_baniere.php?id=<?php echo $_GET['id'];?>" class="btn custom-btn">Découvrir</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>

            <section class="front-product">
                <div class="container-fluid p-0">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-12">
                            <img src="images/slideshow/baniere/<?= htmlspecialchars($baniere['images_grd']) ?>" class="img-fluid product-image" alt="">
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="px-5 py-5 py-lg-0">
                                <h2 class="mb-4"><span>Récapitulatif</h2>
                                <p class="lead mb-4">
                                <?= htmlspecialchars($baniere['grde_descript']) ?>
                                </p>                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>

<?php include('footer.php');?>