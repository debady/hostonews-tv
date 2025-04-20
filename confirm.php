<?php
    session_start();    
    $titre_appli ="Confirmation de Profile " ; 

    include('entete_form.php');
    include('traitement/etat_connect.php');
?>
        <main>
            <section class="sign-in-form section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto col-12">
                            <h1 class="hero-title text-center mb-5">Confirmation votre identité</h1>
                            <div class="row">
                                <div class="col-lg-8 col-11 mx-auto">
                                    <form role="form" method="post" action="traitement/trait_confirm.php">
                                        <div class="form-floating mb-4 p-0">
                                            <input type="number" name="verification_code" id="verification_code" class="form-control" placeholder="Tapez le code" required>
                                            <label for="verification_code">Entrez le code réçu par Sms</label>
                                        </div>
                                        <p class="product-p"><a href="traitement/ressend_code.php?token=<?php if(isset($_GET['token'])){echo $_GET['token'];} ?>">Renvoyer le code</a></p>
                                        <p class="product-p"><a href="">Je n'es pas réçu de code</a></p>
                                        <button type="submit" class="btn custom-btn form-control mt-4 mb-3">
                                            Soumettre
                                        </button>
                                        <p class="text-center">Pas de compte ? <a href="inscription.php">Créé un !</a></p>
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
            if (status === "error_code_verif") {
                    
                Swal.fire({
                    title: "Erreur !",
                    text: "Code de vérification invalide.",
                    icon: "error",
                    confirmButtonText: "Réessayer !"
                });
                sessionStorage.removeItem("status");
            }

            // --------------------

            if (status === "error_non_confirm") {
                    
                Swal.fire({
                    title: "Erreur !",
                    text: "Veuillez confirmé votre identité.",
                    icon: "error",
                    confirmButtonText: "Réessayer !"
                });
                sessionStorage.removeItem("status");
            }

            // --------------------

            if (status === "succes_inscript") {
                    
                Swal.fire({
                    title: "Succès !",
                    text: "Inscription Réussie. Nous vous avons envoyer un code par Email !",
                    icon: "success",
                    confirmButtonText: "D'accord !"

                });
                sessionStorage.removeItem("status");
            }
        </script> 

<?php include('footer.php');?>