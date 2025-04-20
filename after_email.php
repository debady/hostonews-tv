<?php 

    $titre_appli = 'Confirmatio par lien Email ';
    include('entete1.php');

    if($_SESSION['confirme_mail'] == TRUE){
        unset($_SESSION['confirme_mail']);
    }else {
        header('location: connexion.php');
    }
    
    include('entete2.php');
?>
            <style>
                .email-link {
                    display: inline-block;
                    margin-top: 20px;
                    padding: 10px 20px;
                    font-size: 16px;
                    font-weight: bold;
                    color: #fff;
                    background-color: #007bff;
                    text-decoration: none;
                    border-radius: 5px;
                    transition: background-color 0.3s ease, transform 0.2s ease;
                }

                .email-link:hover {
                    background-color: #0056b3;
                    transform: translateY(-2px);
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                }

                .email-link:active {
                    background-color: #003d80;
                    transform: translateY(0);
                }
                
            </style>

            <header class="site-header section-padding d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-12">
                        <div class="container">
                            <h1>Email envoyé avec succès !</h1>
                            <p>Nous vous avons envoyé un lien par email. Veuillez vérifier votre boîte email.</p>
                            <a href="https://mail.google.com" class="email-link" target="_blank">Ouvrir ma boîte email</a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <script>

               const status = sessionStorage.getItem("status");
               if (status === "mail_send") {
                    
                    Swal.fire({
                        title: "Succès !",
                        text: "Nous vous avons envoyer un Lien par Email !",
                        icon: "success",
                        confirmButtonText: "D'accord !"
    
                    });
                    sessionStorage.removeItem("status");
                }

                // -----------------------------

                if (status === "lien_error") {
                    
                    Swal.fire({
                        title: "Erreur !",
                        text: "Lien erroné ou obsolète !",
                        icon: "error",
                        confirmButtonText: "Réessayer !"
                    });
                    sessionStorage.removeItem("status");
                }
	        </script>
<?php include('footer.php'); ?>