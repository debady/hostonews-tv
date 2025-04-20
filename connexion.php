<?php  
    session_start();
    $titre_appli ="Connexion" ; 

    include('entete_form.php');
    include('traitement/etat_connect.php');

?>
        <main>
            <section class="sign-in-form section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto col-12">
                            <h1 class="hero-title text-center mb-5">Connexion</h1>
                            <div class="row">
                                <div class="col-lg-8 col-11 mx-auto">
                                    <form role="form" method="post" action="traitement/trait_connect.php">
                                        <div class="form-floating mb-4 p-0">
                                            <input type="email" name="email_connect" id="email_connect" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Votre Email" required>
                                            <label for="email_connect">Email</label>
                                        </div>
                                        <div class="form-floating p-0">
                                            <input type="password" name="mdp_connect" id="mdp_connect" class="form-control" placeholder="Votre mot de passe" required>
                                            <label for="mdp_connect">Mot de passe</label>
                                        </div>
                                        <button type="submit" class="btn custom-btn form-control mt-4 mb-3">
                                            Se connecter
                                        </button>
                                        <p class="text-center">Pas de compte ? <a href="inscription.php">Créé un !</a></p>
                                        <p class="text-center"><a href="mdp_forget.php">J'ai oublié mon Mot de passe !</a></p>

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

                    case "compte_verif":
                        Swal.fire({
                        title: "Succès !",
                        text: "Votre compte à été confirmé avec success",
                        icon: "success",
                        confirmButtonText: "Ok"
                    });
                    break;

                    case "succes_inscript_number":
                        Swal.fire({
                        title: "Succès !",
                        text: "Inscription réussie !",
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

                    case "error_coordonnes":
                        Swal.fire({
                            title: "Erreur !",
                            text: "Coordonnées de connexion incorrect !",
                            icon: "error",
                            confirmButtonText: "Réessayer !"
                        });
                        break;

                    case "error_champs_vide":
                        Swal.fire({
                            title: "Erreur !",
                            text: "Veuillez remplir les champs !",
                            icon: "error",
                            confirmButtonText: "Réessayer !"
                        });
                        break;
                }
                sessionStorage.removeItem("status");
            }
        </script> 

<?php include('footer.php');?>