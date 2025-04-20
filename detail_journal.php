<?php 
    $titre_appli = 'Detail Journal télévisé ';
    include('entete1.php');   
    
   include('traitement/connect_BD.php');

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = intval($_GET['id']);

        $stmt = $pdo->prepare("SELECT * FROM journauxtelevises WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $journal = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$journal) {
            // die("Aucune émission trouvée avec cet ID.");
            header('Location: index.php');
        }
    } else {
        // die("ID invalide.");
        header('Location: index.php');
    }

    include('entete2.php');
?>


            <section class="product-detail section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="product-thumb">
                                <video src="<?php if(isset($journal['url_Video'])){ echo htmlspecialchars($journal['url_Video']); }?>" autoplay loop muted controls class="img-fluid"></video>
                                <!-- <video src="<?php if(isset($journal['url_Video'])){ echo htmlspecialchars($journal['url_Video']); }?>" poster="images/slideshow/journal/<?php if(isset($journal['miniature'])){ echo  htmlspecialchars($journal['miniature']) ;}?>?text=Cliquez+pour+jouer" loop muted controls class="img-fluid"></video> -->
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="product-info d-flex">
                                <div>
                                    <h2 class="product-title mb-0"><?php if(isset($journal['titre'])){ echo  htmlspecialchars($journal['titre']); }?></h2>
                                    <p class="product-p"><?php if(isset($journal['petiteDescription'])){ echo  htmlspecialchars($journal['petiteDescription']); }?></p>
                                </div>
                                <small class="product-price text-muted ms-auto mt-auto mb-5">Publié le <?php if(isset($journal['datePublication'])){ echo  htmlspecialchars($journal['datePublication']); }?></small>
                            </div>
                            <div class="product-description">
                                <strong class="d-block mt-4 mb-2">Recapitulatif</strong>
                                <p class="lead mb-5"><?php if(isset($journal['grandeDescription'])){ echo  htmlspecialchars($journal['grandeDescription']); }?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="front-product">
                <div class="container-fluid p-0">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-12">
                            <img src="images/slideshow/journal/<?php if(isset($journal['miniature'])){ echo  htmlspecialchars($journal['miniature']) ;}?>" class="img-fluid product-image" alt="">
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="px-5 py-5 py-lg-0">
                                <h2 class="mb-4"><span>Récapitulatif </h2>
                                <p class="lead mb-4"><?php if(isset($journal['grandeDescription'])){ echo  htmlspecialchars($journal['grandeDescription']); }?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <?php include('session_emission.php');?>
    </main>

<?php 
    include('footer.php');
?>