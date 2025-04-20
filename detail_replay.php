<?php
    include('traitement/connect_BD.php');

    if (!isset($_GET['id']) || empty($_GET['id'])) {
        // die("ID non fourni.");
        header('Location: replay.php');
    }

    $id = intval($_GET['id']);
    $sql = "SELECT * FROM replay WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $replay = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$replay) {
        // die("Replay introuvable.");
        header('Location: replay.php');
    }

    $titre_appli = htmlspecialchars($replay['title']) ;
    include('entete1.php');
    include('entete2.php');



    // ajout du commentaire
    $conn = new mysqli('localhost', 'root', '', 'bd_hostonews_tv');

    $sql = "SELECT nom_prenom, photo, commentaire FROM commentaires WHERE id_direct = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_direct);

    $stmt->execute();
    $result = $stmt->get_result();

    $comments = [];
    while ($row = $result->fetch_assoc()) {
        $comments[] = $row;
    }
?>


            <section class="product-detail section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12">
                            <div class="product-thumb">
                                <!-- <iframe 
                                    src="<?= htmlspecialchars($replay['video_url']) ?>" 
                                    frameborder="0" 
                                    allow="autoplay; encrypted-media; loop; picture-in-picture" 
                                    allowfullscreen 
                                    class="img-fluid"
                                    style="width: 100%; height: 500px; border-radius: 10px;">
                                </iframe> -->
                                <video src="<?= htmlspecialchars($replay['video_url']) ?>" controls autoplay ></video>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="product-info d-flex">
                                <div>
                                    <h2 class="product-title mb-0"><?= htmlspecialchars($replay['title']) ?></h2>
                                    <p class="product-p"><?= htmlspecialchars($replay['description']) ?></p>
                                </div>
                                <small class="product-price text-muted ms-auto mt-auto mb-5">Publié le <?= htmlspecialchars($replay['event_date']) ?></small>
                            </div>
                           
                            <div class="product-description">
                                <strong class="d-block mt-4 mb-2">Recapitulatif</strong>
                                <p><?= htmlspecialchars($replay['alert_label'] ?? 'N/A') ?></p>
                                <p><?php echo 'reaction :' .htmlspecialchars($replay['reaction_count']) ?></p>
                                <button id="toggle-comments" class="btn btn-primary mt-4">Voir les commentaires</button>

                                <form id="comment-form" method="POST">
                                    <div id="comments-section" style="display: none;">
                                        <div class="comments-list">
                                            <?php foreach ($comments as $comment): ?>
                                            <div class="comment">
                                                <img src="<?= htmlspecialchars($comment['photo']) ?>" alt="Image de <?= htmlspecialchars($comment['nom_prenom']) ?>" class="comment-avatar">
                                                <strong><?= htmlspecialchars($comment['nom_prenom']) ?></strong>
                                                <p><?= htmlspecialchars($comment['commentaire']) ?></p>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </form>
                                <form action="trait_infos/trait_comment_replays.php" method="POST">
                                    <div class="form-group">
                                        <label for="comment">Ajouter un commentaire:</label>

                                        <input type="hidden" name="id_users" value = "<?php if(isset($_SESSION['id'])){echo $_SESSION['id'];}else{echo 1000;} ?>">
                                        <input type="hidden" name="nom_prenom" value = "<?php if(isset($_SESSION['nom_prenom'])){echo $_SESSION['nom_prenom'];}else{echo 'Anonyme';} ?>">
                                        <input type="hidden" name="photo_profil" value = "<?php if(isset($_SESSION['photo_profil'])){echo $_SESSION['photo_profil'];}else{echo 'default1.png';} ?>">
                                        <input type="hidden" name="id_video" value = "<?= htmlspecialchars($replay['id']) ?>">
                                        
                                        <textarea id="comment" name="comment" class="form-control" rows="3" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success mt-2">Envoyer</button>
                                </form>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="front-product">
                <div class="container-fluid p-0">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-12">
                            <img src="images/slideshow/replay/<?= htmlspecialchars($replay['image_path']) ?>" class="img-fluid product-image" alt="">
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="px-5 py-5 py-lg-0">
                                <h2 class="mb-4"><span>Resumé</h2>
                                <p class="lead mb-4"><?php if($replay['recapitulatif'] != NULL){ echo htmlspecialchars($replay['recapitulatif']);} ?></p>                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <?php include('session_emission.php');?>
    </main>

    <script>
        document.getElementById('toggle-comments').addEventListener('click', function() {
            const commentsSection = document.getElementById('comments-section');
            commentsSection.style.display = commentsSection.style.display === 'none' ? 'block' : 'none';
        });

        const status = sessionStorage.getItem("status");

        if (status) {
            switch (status) {
                case "succes_comment":
                    Swal.fire({
                        icon: 'info',
                        title: 'Commenté !',
                        text: 'Vous avez commenté ce poste.',
                        timer: 3000,
                        showConfirmButton: false
                    });
                    break;
            }
            sessionStorage.removeItem("status");
        }
    </script>
<?php include('footer.php');?>