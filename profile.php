<?php 
    $titre_appli = "Profile ";
    include('entete1.php');

    if(!($_SESSION['token']) OR empty($_GET['acces_token']) OR $_SESSION["token"] != $_GET['token'] ){
        header('Location: connexion.php');
    }

    include('entete2.php');
?>
            <style>
                .zoom-effect {
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                }
                .zoom-effect:hover {
                    transform: scale(2.2); 
                    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3); 
                }
            </style>

            <section class="product-detail section-padding">
                <div class="container">
                    <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="product-thumb">
                            <a href="change_photo.php?token=<?php echo $_SESSION['token'].'&acces_token='.$_SESSION['acces_token'];?>" class="product-additional-link">
                                <img style="border-radius: 200px;" width="300PX" src="images/Peoples/<?php echo $_SESSION['photo_profil'];?>" class="img-fluid product-image zoom-effect" alt="Ajoutez une photo">
                            </a>
                        </div>
                    </div>
                        <div class="col-lg-6 col-12">
                            <div class="product-info d-flex">
                                <div>
                                    <p class="product-p">Bienvenue chez vous profitez !</p>
                                    <h2 class="product-title mb-0"><?php echo $_SESSION['nom_prenom'];?></h2>
                                </div>
                                <small class="product-price text-muted ms-auto mt-auto mb-5">Inscris le : <?php echo $_SESSION['date_inscription']  ?> </small>
                            </div>
                            <div class="product-description">
                                <p class="lead mb-5"><?php if(!empty($_SESSION['email'])){ echo "Email : " .$_SESSION['email'];}?></p>
                                <p class="lead mb-5"><?php if(!empty($_SESSION['numero'])){ echo "Numéro : " .$_SESSION['numero'];}?></p>
                                <p class="lead mb-5"><?php if(!empty($_SESSION['pays'])){ echo "Pays : " .$_SESSION['pays'];}?></p>
                            </div>
                            <div class="product-cart-thumb row">
                                <div class="col-lg-6 col-12 mt-4 mt-lg-0">
                                    <a href="direct.php" target="_blank" rel="noopener noreferrer"><button type="submit" class="btn custom-btn cart-btn" data-bs-toggle="modal" data-bs-target="#cart-modal">Direct</button></a>
                                </div>
                                <p>
                                    <a href="modif_me.php?token=<?php echo $_SESSION['token']."&acces_token".$_SESSION['acces_token'];?>" class="product-additional-link"><?php if(empty($_SESSION['nom_prenom']) or empty($_SESSION['email']) or empty($_SESSION['numero']) or empty($_SESSION['pays'])){echo 'Complètez mon profile'; }else{echo 'Modifier mes  données';} ?>  <i class="fa fa-pencil-alt"></i></a>
                                    <a href="traitement/deconnexion" class="product-additional-link">Deconnexion <i class="fa fa-sign-out-alt"></i></a>
                                    <button class="product-additional-link" onclick="confirmSuppression_Bateau(<?php echo $_SESSION['id']; ?>)"> <i class="fa fa-trash"></i></button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

           <?php include('mes_reactions.php');?>
        </main>

        <script>
            const status = sessionStorage.getItem("status");

            if (status) {
                switch (status) {
                    case "modif_succes":
                        Swal.fire({
                        title: "Succès !",
                        text: "Modification apporté !",
                        icon: "success",
                        confirmButtonText: "Ok"
                    });

                        break;
                    case "change_photo_succes":
                        Swal.fire({
                        title: "Succès !",
                        text: "Votre photo a bien été changée !",
                        icon: "success",
                        confirmButtonText: "Ok"
                    });

                        break;

                    case "mdp_change":
                        Swal.fire({
                        title: "Succès !",
                        text: "Mot de passe changer avec succès !",
                        icon: "success",
                        confirmButtonText: "Ok"
                    });
                        break;
                }
                sessionStorage.removeItem("status");
            }

            // demande de suppression compte
            function confirmSuppression_Bateau(id) {
                Swal.fire({
                    title: 'Êtes-vous sûr de vouloir supprimer votre compte ?',
                    text: "Cette action est irréversible!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui, supprimer !',
                    cancelButtonText: 'Annuler'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "traitement/trait_supprime.php?id=" + id;
                    }
                })
            }
        </script> 

<?php include('footer.php');?>