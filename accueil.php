<?php 

    $titre_appli = "Accueil ";
    include('entete1.php');

    include('entete2.php');
    include('scrolle.php');

    if (isset($_SESSION['alerte'])) {

        $message = $_SESSION['alerte'];
        echo "<div id='alerte' class='alert'>$message</div>";
        unset($_SESSION['alerte']);
    }
?>

<style>
    .alert {
        padding: 15px;
        background-color: #f44336; /* Rouge clair */
        color: white;
        margin-bottom: 15px;
        text-align: center;
        border-radius: 5px;
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 1000;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        animation: fadeOut 5s forwards;
    }

    @keyframes fadeOut {
        0% { opacity: 1; }
        90% { opacity: 1; }
        100% { opacity: 0; display: none; }
    }
</style>

<!-- journal -->
<?php
    include('traitement/connect_BD.php'); // Connexion à la base de données

    // Initialiser les variables pour éviter des erreurs si aucun élément n'est trouvé
    $titre = '';
    $petiteDescription = '';
    $url_Video = '';

    try {
        $stmt = $connect->query("SELECT MIN(id) AS min_id, MAX(id) AS max_id FROM journauxtelevises");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $min_id = $result['min_id'];
        $max_id = $result['max_id'];

        if ($min_id === null || $max_id === null) {
            // Retourner un message pour afficher une alerte en JavaScript
            echo "<script>
                Swal.fire({
                    icon: 'info',
                    title: 'En attente',
                    text: 'La table journauxtelevises est vide pour le moment.',
                    timer: 3000,
                    showConfirmButton: false
                });
            </script>";
        }else {
            // Étape 2 : Générer un ID aléatoire entre min_id et max_id
            $random_id = rand($min_id, $max_id);

            // Étape 3 : Récupérer les informations de l'élément avec cet ID
            $stmt = $connect->prepare("SELECT * FROM journauxtelevises WHERE id = :random_id");
            $stmt->execute([':random_id' => $random_id]);
            $element = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($element) {
                // Assigner les valeurs des champs aux variables
                $id = htmlspecialchars($element['id']);
                $titre = htmlspecialchars($element['titre']);
                $petiteDescription = htmlspecialchars($element['petiteDescription']);
                $url_Video = htmlspecialchars($element['url_Video']);
                $date_publie = htmlspecialchars($element['datePublication']);
                $mignature = htmlspecialchars($element['miniature']);
            }
        }
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
?>

<!-- derniere nouvelle -->
<?php
    // Configuration de la base de données
    $host = 'localhost';
    $dbname = 'bd_hostonews_tv';
    $user = 'root';
    $password = '';

    try {
        // Connexion à la base de données
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }

    // Récupérer les 3 premières émissions par catégorie
        $sql = "SELECT * FROM emissions 
        WHERE categorie IS NOT NULL 
        GROUP BY categorie, id 
        ORDER BY categorie, id ASC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $emissions = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Réorganiser les émissions par catégorie
        $categories = [];
        if (empty($emissions)) {
        // Si aucune émission n'est trouvée, enregistrer un message dans la session
        $_SESSION['message'] = "Aucune émission disponible pour le moment.";
        } else {
        // Réorganiser les émissions par catégorie
        foreach ($emissions as $emission) {
        $categories[$emission['categorie']][] = $emission;
        }
        }
?>

<?php
    // Connexion à la base de données
    $host = 'localhost';
    $dbname = 'bd_hostonews_tv';
    $username = 'root';
    $password = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }

    // / Récupérer une actualité aléatoire par catégorie
    function getRandomNewsByCategory($pdo, $category) {
        $stmt = $pdo->prepare("SELECT * FROM derniere_news WHERE category = :category ORDER BY RAND() LIMIT 1");
        $stmt->execute([':category' => $category]);
        $news = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$news) {
            // Si aucune actualité n'est trouvée, enregistrer un message dans la session
            $_SESSION['messages'][] = "Aucune actualité trouvée pour la catégorie : {$category}.";
        }else {
               // Actualités pour chaque catégorie
            $newsALaUne = getRandomNewsByCategory($pdo, 'À la une');
            $newsConseils = getRandomNewsByCategory($pdo, 'Conseils Pratiques');
            $newsPrevention = getRandomNewsByCategory($pdo, 'Prévention');
        }

        return $news;
    }


    // Afficher le message s'il existe dans la session
    if (isset($_SESSION['message'])) {
        echo "<p class='alert alert-info'>" . htmlspecialchars($_SESSION['message']) . "</p>";
        unset($_SESSION['message']); // Supprimer le message après affichage
    }
?>
            <section class="about section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h2 class="mb-5">Actualités Santé</h2>
                        </div>
                        <div class="col-lg-2 col-12 mt-auto mb-auto">
                            <ul class="nav nav-pills mb-5 mx-auto justify-content-center align-items-center" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">À la une</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-youtube-tab" data-bs-toggle="pill" data-bs-target="#pills-youtube" type="button" role="tab" aria-controls="pills-youtube" aria-selected="true">Conseils Pratiques</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-skill-tab" data-bs-toggle="pill" data-bs-target="#pills-skill" type="button" role="tab" aria-controls="pills-skill" aria-selected="false">Prévention</button>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-10 col-12">
                            <div class="tab-content mt-2" id="pills-tabContent">
                                <!-- Section "À la une" -->
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="row">
                                        <div class="col-lg-7 col-12">
                                            <?php if (isset($newsALaUne['image_url'])): ?>
                                                <img src="<?php if(isset($newsALaUne)){echo htmlspecialchars($newsALaUne['image_url']);} ?>" class="img-fluid" alt="Image À la une">
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-lg-5 col-12">
                                            <div class="d-flex flex-column h-100 ms-lg-4 mt-lg-0 mt-5">
                                                <h4 class="mb-3"><?php if(isset($newsALaUne)){echo htmlspecialchars($newsALaUne['title']);} ?></h4>
                                                <p><?php if(isset($newsALaUne)){echo htmlspecialchars($newsALaUne['description']);} ?></p>
                                                <div class="mt-2 mt-lg-auto">
                                                    <a href="about.html" class="custom-link mb-2">
                                                        En savoir plus
                                                        <i class="bi-arrow-right ms-2"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Section "Conseils Pratiques" -->
                                <div class="tab-pane fade" id="pills-youtube" role="tabpanel" aria-labelledby="pills-youtube-tab">
                                    <div class="row">
                                        <div class="col-lg-7 col-12">
                                            <?php if (isset($newsConseils['video_url'])): ?>
                                                <div class="ratio ratio-16x9">
                                                    <video  controls src="<?php if(isset($newsConseils)){echo htmlspecialchars($newsConseils['video_url']);} ?>"></video>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-lg-5 col-12">
                                            <div class="d-flex flex-column h-100 ms-lg-4 mt-lg-0 mt-5">
                                                <h4 class="mb-3"><?php if(isset($newsConseils)){echo htmlspecialchars($newsConseils['title']);} ?></h4>
                                                <p><?php if(isset($newsConseils)){echo htmlspecialchars($newsConseils['description']);} ?></p>
                                                <div class="mt-2 mt-lg-auto">
                                                    <a href="contact.html" class="custom-link mb-2">
                                                        Découvrir
                                                        <i class="bi-arrow-right ms-2"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Section "Prévention" -->
                                <div class="tab-pane fade" id="pills-skill" role="tabpanel" aria-labelledby="pills-skill-tab">
                                    <div class="row">
                                        <div class="col-lg-7 col-12">
                                            <?php if (isset($newsPrevention['image_url'])): ?>
                                                <img src="<?php if(isset($newsPrevention)){echo htmlspecialchars($newsPrevention['image_url']);} ?>" class="img-fluid" alt="Image Prévention">
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-lg-5 col-12">
                                            <div class="d-flex flex-column h-100 ms-lg-4 mt-lg-0 mt-5">
                                                <h4 class="mb-3"><?php if(isset($newsPrevention)){echo htmlspecialchars($newsPrevention['title']);} ?></h4>
                                                <p><?php if(isset($newsPrevention)){echo htmlspecialchars($newsPrevention['description']);} ?></p>
                                                <div class="mt-2 mt-lg-auto">
                                                    <a href="prevention.html" class="custom-link mb-2">
                                                        En savoir plus
                                                        <i class="bi-arrow-right ms-2"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                            <div class="ratio ratio-16x9">
                                <video controls width="640" height="360" poster="images/slideshow/journal/<?php if(isset($mignature)){ echo $mignature ;} ?>?text=Cliquez+pour+jouer">
                                    <source src="<?php if(isset($url_Video)){ echo $url_Video ;} ?>" type="video/mp4">
                                    Votre navigateur ne supporte pas la balise vidéo.
                                </video>
                            </div>
                        </div>                            
                        <div class="col-lg-6 col-12">
                            <div class="px-5 py-5 py-lg-0">
                                <h2 class="mb-4">Journal Télévisé <span> du <?php if(isset($titre)){ echo $titre;} ?></span></h2>
                                <p class="lead mb-4"><?php if(isset($petiteDescription)){ echo $petiteDescription;} ?></p>
                                <p><?php if(isset($date_publie)){ echo 'Du '.  $date_publie ;}?></p>
                                <a href="detail_journal.php?id=<?php if(isset($id)){ echo $id;} ?>" class="custom-link">
                                    En savoir plus
                                    <i class="bi-arrow-right ms-2"></i>
                                </a>
                                <img src="<?php if(isset($mignature)){ echo $mignature ;} ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>  
            
            <?php include('session_emission.php');?>
        </main>

<?php include('footer.php');?>