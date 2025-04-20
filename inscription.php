<?php 
    session_start();
    $titre_appli ="Inscription" ;
    include('traitement/etat_connect.php');
 
    include('entete_form.php');
?>
   
        <main>
            <section class="sign-in-form section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto col-12">
                            <h1 class="hero-title text-center mb-5">S'inscrire Avec</h1>
                            <div class="social-login d-flex flex-column w-50 m-auto">
                                <a href="#" class="btn custom-btn social-btn mb-4">
                                    <i class="bi bi-google me-3"></i>
                                    Continuer avec  Google
                                </a>
                                <a href="#" class="btn custom-btn social-btn">
                                    <i class="bi bi-facebook me-3"></i>
                                    Continuer avec facebook
                                </a>                                
                            </div>

                            <div class="div-separator w-50 m-auto my-5"><span>Ou bien</span></div>
                                    
                            <div class="row">
                                <div class="col-lg-8 col-11 mx-auto">

                                    <form id="registrationForm" role="form" method="post" action="traitement/trait_inscript.php">
                                        <div class="form-floating">
                                            <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Votre Email" required>
                                            <label for="email">Votre Email </label>
                                        </div>

                                        <div class="form-floating my-4">
                                            <input type="password" name="mdp1" id="password" class="form-control" placeholder="Mot de passe" required>
                                            <label for="password">Mot de passe</label>
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
                                    
                                        <div class="form-floating">
                                            <input type="password" name="mdp2" id="confirm_password" class="form-control" placeholder="Confirmez votre mot de passe" required>
                                            <label for="confirm_password">Rétapez le Mot de passe</label>
                                        </div>
                                        <!-- recaptcha -->
                                        <div class="g-recaptcha" data-sitekey="6LdmVYgqAAAAAMb97bsgv_CVxsJ9VqW9p4joeSzF"></div>
                                        <p>
                                            <?php 
                                            if (isset($_SESSION["error"])) {
                                                echo "<p style='color:red;'>".$_SESSION['error']."</p>";
                                                unset( $_SESSION['error']);

                                            }elseif (isset($_SESSION["suces"])) {
                                                echo "<p style='color:green;'>".$_SESSION['suces']."</p>";
                                                unset( $_SESSION['suces']);
                                            }
                                            
                                            ?>
                                        </p>

                                        <button type="submit" class="btn custom-btn form-control mt-4 mb-3">
                                            Créé mon compte
                                        </button>
                                        <p class="text-center">Préfère Numéro de ? <a href="inscription_numb.php">Télépone</a></p>
                                        <p class="text-center">Déjà un compte ? <a href="connexion.php">Se connecter</a></p>
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

            if (status) {
                switch (status) {
                    case "error_inattendu":
                        Swal.fire({
                            title: "Erreur !",
                            text: "Une Erreur Inattendue s'est produite",
                            icon: "error",
                            confirmButtonText: "Réessayer !"
                        });
                        break;

                    case "error_recaptcha":
                        Swal.fire({
                            title: "Erreur !",
                            text: "Veuillez vérifier le reCAPTCHA.",
                            icon: "error",
                            confirmButtonText: "Réessayer !"
                        });
                        break;

                    case "error_send_mail":
                        Swal.fire({
                            title: "Erreur !",
                            text: "Une erreur est survenue lors de l'envoi de l'email.",
                            icon: "error",
                            confirmButtonText: "Réessayer !"
                        });
                        break;

                    case "error_Condif_mdp":
                        Swal.fire({
                            title: "Erreur !",
                            text: "Votre mot de passe ne respect pas les conditions de sécurité ",
                            icon: "error",
                            confirmButtonText: "Réessayer !"
                        });
                        break;

                    case "error_mdp1_2":
                        Swal.fire({
                            title: "Erreur !",
                            text: "Les Mots de passe ne corespondent pas !",
                            icon: "error",
                            confirmButtonText: "Réessayer !"
                        });
                        break;

                    case "error_email_occup":
                        Swal.fire({
                            title: "Erreur !",
                            text: "Cet email est déjà utilisé !",
                            icon: "error",
                            confirmButtonText: "Réessayer !"
                        });
                        break;

                    case "error_send_sms":
                        Swal.fire({
                            title: "Erreur !",
                            text: "Problème d'envoie du Sms!",
                            icon: "error",
                            confirmButtonText: "Réessayer !"
                        });
                        break;

                    case "error_number_occup":
                        Swal.fire({
                            title: "Erreur !",
                            text: "Cet Numéro est déjà utilisé !",
                            icon: "error",
                            confirmButtonText: "Réessayer !"
                        });
                        break;

                    case "error_len_mdp":
                        Swal.fire({
                            title: "Erreur !",
                            text: "le Numéro doit être sous format +178825455!",
                            icon: "error",
                            confirmButtonText: "Réessayer !"
                        });
                        break;
                }
                sessionStorage.removeItem("status");
            }

        </script> 
        
<?php include('footer.php');?>