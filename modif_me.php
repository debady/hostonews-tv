<?php  
    $titre_appli = "Modification de mes données ";
    
    // if(!($_SESSION['token'])){
    //     header('Location: connexion.php');
    // }

    include('entete1.php');
    include('entete2.php');

?>

            <section class="product-detail section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="product-thumb">
                                <a href="change_photo.php?token=<?php echo $_SESSION['token'].'&acces_token='.$_SESSION['acces_token'];?>" class="product-additional-link">
                                    <img style="border-radius: 200PX;" src="images/Peoples/<?php if(!empty($_SESSION['photo_profil'])){ echo $_SESSION['photo_profil'];}else{ echo 'default'.rand(1,4).".png";}?>" class="img-fluid product-image" alt="Ajoutez une photo">
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="product-info d-flex">
                                <form action="traitement/trait_change.php" method="post">
                                    <div>
                                        <div>
                                            <p class="product-p">Apportez des changements : Inscris le : <?php echo  $_SESSION['date_inscription']  ?></p>
                                            <h2 class="product-title mb-0">Civilité <input type="text" name="new_nom" value="<?php echo $_SESSION['nom_prenom'];?>" placeholder="Entrez votre Nom"></h2>
                                        </div>

                                        <div class="product-description">

                                        <p class="lead mb-5">Email : <input type="text" name="new_email" value="<?php if(!empty($_SESSION['email'])){ echo $_SESSION['email'];}?>"></p>
                                        <p class="lead mb-5">Numéro : <input type="number" name="new_numero" value="<?php if(!empty($_SESSION['numero'])){ echo $_SESSION['numero'];}?>" placeholder="Votre numéro"></p>
                                        <p class="lead mb-5">Pays : <input type="text" name="new_pays" value="<?php if(!empty($_SESSION['pays'])){ echo $_SESSION['pays'];}?>"></p>
                                    </div>
                                    <div class="product-cart-thumb row">
                                        <div class="col-lg-6 col-12 mt-4 mt-lg-0">
                                            <button type="submit" class="btn custom-btn cart-btn" data-bs-toggle="modal" data-bs-target="#cart-modal">Changer</button>
                                        </div>
                                    </div>
                                </form>
                                <p>
                                    <a href="profile.php?token=<?php echo $_SESSION['token']."&acces_token".$_SESSION['acces_token'];?>" class="product-additional-link"><i class="fa fa-arrow-left"></i> <?php if(empty($_SESSION['nom_prenom']) or empty($_SESSION['email']) or empty($_SESSION['numero']) or empty($_SESSION['pays'])){echo 'Retour'; }else{echo 'Profile';} ?>  </a>
                                    <a href="new_mdp.php?token=<?php echo $_SESSION['token'];?>&etat_chnage_mdp=connetcer" class="product-additional-link">Changer de mot de passe <i class="fa fa-edit"></i></a>
                                    <button class="product-additional-link" onclick="confirmSuppression_Bateau(<?php echo $_SESSION['id']; ?>)"> <i class="fa fa-trash"></i></button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
           <?php include('mes_reactions.php');?>
        </main>

   <?php include('footer.php');?>