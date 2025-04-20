<?php  
    session_start();
    $titre_appli ="Nouveau Mdp" ; 
    include('entete_form.php');

    if($_SESSION['token'] != $_GET['token'] OR !$_SESSION['compte_trouver']){
        header('location: mdp_forget.php');
    }

?>

        <main>
            <section class="sign-in-form section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto col-12">
                            <h1 class="hero-title text-center mb-5">Nouveau mot de passe</h1>
                            <div class="row">
                                <div class="col-lg-8 col-11 mx-auto">
                                    <form role="form" method="post" action="traitement/trait_change_mdp.php?token=<?php echo $_GET['token'];?>">
                                        <div class="form-floating mb-4 p-0">
                                            <input type="password" name="new_mdp1" id="password" class="form-control" placeholder="changer de mot de passe" required>
                                            <label for="new_mdp1">Mot de passe</label>
                                        </div>
                                        <p class="product-p">
                                            Le mot de passe doit être :
                                            <ul id="password-requirements">
                                                <li id="length">Plus de 8 caractères</li>
                                                <li id="uppercase">Une lettre majuscule</li>
                                                <li id="number">Un chiffre</li>
                                                <li id="special">Un caractère spécial</li>
                                            </ul>
                                        </p>
                                        <div class="form-floating p-0">
                                            <input type="password" name="new_mdp2" id="new_mdp2" class="form-control" placeholder="Rétapez le mot de passe" required>
                                            <label for="new_mdp2">Confirmez le Mot de passe</label>
                                            <input type="hidden" name="connecter_non_connecter" value="<?php if(!empty($_GET['etat_chnage_mdp'])){ echo $_GET['etat_chnage_mdp']; }?>">
                                        </div>
                                        <button type="submit" class="btn custom-btn form-control mt-4 mb-3">
                                            Confirmer
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </main>
        
        <script>
            const status = sessionStorage.getItem("status");

            if (status === "compte_trouver") {
                    
                Swal.fire({
                    title: "Succès !",
                    text: "Veuillez saisir un mot de passe robustre !",
                    icon: "success",
                    confirmButtonText: "Réessayer !"
                });

                sessionStorage.removeItem("status");
            } //  la rediection apres avoir cliquer sur le lien de reinitialisation doit pouvoir afficher ce switch


            if (status === "error_mdp1_2") {
                    
                Swal.fire({
                    title: "Erreur !",
                    text: "Les mots de passe ne corespondent pas !",
                    icon: "error",
                    confirmButtonText: "Réessayer !"
                });

                sessionStorage.removeItem("status");
            }
            if (status === "error_mdp_empty") {
                    
                Swal.fire({
                    title: "Erreur !",
                    text: "Veuillez remplir les champs !",
                    icon: "error",
                    confirmButtonText: "Réessayer !"
                });

                sessionStorage.removeItem("status");
            }

            if (status === "error_mdp_condif") {
                    
                Swal.fire({
                    title: "Erreur !",
                    text: "Votre mot de passe ne respect pas les règles de sécurité  !",
                    icon: "error",
                    confirmButtonText: "Réessayer !"
                });

                sessionStorage.removeItem("status");
            }
        </script>

<?php include('footer.php');?>