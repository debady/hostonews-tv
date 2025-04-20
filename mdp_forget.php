<?php
    session_start();    
    $titre_appli ="Récuperation de compte " ; 
    
    include('entete_form.php');
    include('traitement/etat_connect.php');
?>

        <main>
            <section class="sign-in-form section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto col-12">
                            <h1 class="hero-title text-center mb-5">Récuperer Mon Compte</h1>

                            <div class="row">
                                <div class="col-lg-8 col-11 mx-auto">
                                    <form role="form" method="post" action="traitement/trait_recup.php">

                                        <div class="form-floating mb-4 p-0">
                                            <input type="email" name="email_recup" id="email_recup" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Votre Email" required>
                                            <label for="email_recup">Email</label>
                                        </div>

                                        <button type="submit" class="btn custom-btn form-control mt-4 mb-3">
                                            Soumettre
                                        </button>

                                        <p class="text-center"><a href="connexion.php">Je me souviens </a></p>
                                        <p class="text-center"><a href="mdp_forget_numb.php">Plutôt par numéro </a></p>
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

            if (status === "error_email_recup") {
                    
                Swal.fire({
                    title: "Erreur !",
                    text: "Aucun compte n'est associé à cet Email !",
                    icon: "error",
                    confirmButtonText: "Réessayer !"
                });

                sessionStorage.removeItem("status");
            }
            // ---------------------------

            if (status === "mail_non_connus") {
                    
                Swal.fire({
                    title: "Erreur !",
                    text: "Un probème s'est produit l'or de l'envoi du Mail!",
                    icon: "error",
                    confirmButtonText: "Réessayer !"
                });

                sessionStorage.removeItem("status");
            }

            // ---------------------------

            if (status === "error_email_empty") {
                    
                Swal.fire({
                    title: "Erreur !",
                    text: "Veuillez remplir le champs",
                    icon: "error",
                    confirmButtonText: "Réessayer !"
                });

                sessionStorage.removeItem("status");
            }
            // ---------------------------
        </script> 

<?php include('footer.php');?>