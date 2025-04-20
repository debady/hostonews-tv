<?php

    $titre_appli = "les emissions " ;
    include('entete1.php');
    include('entete2.php');
    
    include('traitement/connect_BD.php');

    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    if ($id <= 0) {
        header('location: emission.php');
        // die("ID invalide");
    }

    $sql = "SELECT * FROM emissions WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $emission = $result->fetch_assoc();
    } else {
        header('location: emission.php');
        // die("Aucune émission trouvée pour cet ID");
    }

    $stmt->close();
    $conn->close();
?>

            <section class="product-detail section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="product-thumb">
                                <video src="<?= htmlspecialchars($emission['url_emission']) ?>" controls autoplay muted></video>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="product-info d-flex">
                                <div>
                                    <h2 class="product-title mb-0"><?= htmlspecialchars($emission['titre']) ?></h2>
                                    <p class="product-p"><?= htmlspecialchars($emission['ptt_description']) ?></p>
                                </div>
                                <small class="product-price text-muted ms-auto mt-auto mb-5">
                                    Publié le <?= date("d-m-Y", strtotime($emission['datePublication'])) ?>
                                </small>
                            </div>
                            <div class="product-description">
                                <strong class="d-block mt-4 mb-2">Recapitulatif</strong>
                                <p class="lead mb-5"><?= nl2br(htmlspecialchars($emission['grd_description'])) ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="front-product">
                <div class="container-fluid p-0">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-12">
                            <img src="<?= htmlspecialchars($emission['image1']) ?>" class="img-fluid product-image" alt="">
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="px-5 py-5 py-lg-0">
                                <h2 class="mb-4"><span>Récapitulatif</span></h2>
                                <p class="lead mb-4"><?= nl2br(htmlspecialchars($emission['grd_description'])) ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

<?php include('session_emission.php');?>
<?php include('footer.php');?>