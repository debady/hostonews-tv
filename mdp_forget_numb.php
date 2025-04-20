<?php
    session_start();    
    $titre_appli ="Récuperation de compte par numero " ; 
    
    include('entete_form.php');
    include('traitement/etat_connect.php');

    if(isset($_POST['le_bouton'])){
        echo '+225'.$_POST['numb_recup'];
    }
?>

        <main>
            <section class="sign-in-form section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 mx-auto col-12">
                            <h1 class="hero-title text-center mb-5">Récuperer Mon Compte</h1>
                            <div class="row">
                                <div class="col-lg-8 col-11 mx-auto">
                                    <form role="form" method="post" action="#">

                                        <div class="form-floating mb-4 p-0">
                                            <input type="TEL" name="numb_recup" id="phone" class="form-control" placeholder="Votre Numéro de téléphone" required>
                                            <label for="numb_recup">Votre Numéro de téléphone</label>
                                        </div>

                                        <button type="submit" class="btn custom-btn form-control mt-4 mb-3" name='le_bouton'>
                                            Soumettre
                                        </button>

                                        <p class="text-center"><a href="mdp_forget.php">Plutôt par Email</a></p>
                                        <p class="text-center"><a href="connexion.php">Je me souviens </a></p>
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

            // ---------- script recup apr numero le lien api js dans l'entete form-----------------
            document.addEventListener('DOMContentLoaded', function () {
                const phoneInput = document.querySelector("#phone");
                const iti = window.intlTelInput(phoneInput, {
                    initialCountry: "ci", // Pays initial (Côte d'Ivoire)
                    separateDialCode: true, // Afficher le code séparément
                    preferredCountries: ["ci", "fr", "us"], // Mettre en avant certains pays
                    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js" // Utilitaires pour formater
                });
            });

        </script> 

<?php include('footer.php');?>