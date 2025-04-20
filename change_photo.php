<?php 
    session_start();
    $titre_appli = 'Changer de photo';

    include('entete_form.php');
    if(!($_SESSION['token']) OR empty($_GET['acces_token']) OR $_SESSION["token"] != $_GET['token'] ){
        header('Location: connexion.php');
    }
    include('entete2.php')
?>
            <section class="sign-in-form section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto col-12">
                            <div class="row">
                                <div class="col-lg-8 col-11 mx-auto">
                                    <form role="form" method="post" action="traitement/trait_change_photo.php" enctype="multipart/form-data">
                                        <p class="text-center">
                                        <img 
                                            width="400px"
                                            style="border-radius: 200px;" 
                                            src="images/Peoples/<?php if(!empty($_SESSION['photo_profil'])){ echo $_SESSION['photo_profil'];}else{ echo 'default'.rand(1,4).".png";}?>" 
                                            class="img-fluid product-image" 
                                            id="preview-image"
                                            alt="Ajoutez une photo"
                                        >
                                        </p>
                                        <div class="form-floating mb-4 p-0">                    
                                            <input 
                                                type="file" 
                                                name="new_torf" 
                                                accept="image/*" 
                                                id="new_torf" 
                                                class="form-control"
                                                onchange="previewNewImage(event)"
                                            >
                                        </div>

                                        <button type="submit" class="btn custom-btn form-control mt-4 mb-3">
                                            Changer
                                        </button>
                                        <p class="text-center"><a href="profile.php?token=<?php echo $_SESSION['token']."&acces_token".$_SESSION['acces_token'];?>" class="product-additional-link"><i class="fa fa-arrow-left"></i> <?php if(empty($_SESSION['nom_prenom']) or empty($_SESSION['email']) or empty($_SESSION['numero']) or empty($_SESSION['pays'])){echo 'Retour'; }else{echo 'Profile';} ?>  </a></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

<?php include("footer.php");?>