<?php 
    $titre_appli = 'Nous contacter ' ;

    include('entete1.php');
    include('entete2.php');
?>

            <header class="site-header section-padding-img site-header-image">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-12 header-info">
                            <h4>
                                <span class="d-block text-primary">Une question ?</span>
                                <span class="d-block text-dark">Dites nous </span>
                            </ha>
                        </div>
                    </div>
                </div>
                <img src="images/Peoples/<?php if(isset($_SESSION['photo_profil']) and !empty($_SESSION['photo_profil'])){echo $_SESSION['photo_profil'];} ?>" class="header-image img-fluid" alt="">
            </header>

            <section class="contact section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <h2 class="mb-4">Ici ...</span></h2>

                            <form class="contact-form me-lg-5 pe-lg-3" role="form" action = 'traitement/trait_contact.php' method='POST'>

                                <div class="form-floating">
                                    <input type="text" name="name" id="name" class="form-control" required placeholder="Nom & prénom"  value="<?php if(isset($_SESSION['nom_prenom']) and !empty($_SESSION['nom_prenom'])){echo $_SESSION['nom_prenom'];} ?>">
                                    <label for="name">Nom & prénom</label>
                                </div>

                                <div class="form-floating my-4">
                                    <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" required placeholder="Votre Email"  value="<?php if(isset($_SESSION['email']) and !empty($_SESSION['email'])){echo $_SESSION['email'];} ?>">
                                    <label for="email">Votre Email</label>
                                </div>
                                
                                <div class="form-floating my-4">
                                    <input type="subject" name="subject" id="subject"class="form-control" required placeholder="Object"  >
                                    <label for="Object">Object</label>
                                </div>

                                <div class="form-floating mb-4">
                                    <textarea id="message" name="message" class="form-control" required placeholder="Dites nous tout ..."   style="height: 160px"></textarea>
                                    <label for="message">Une préocupation ? n'exitez pas !</label>
                                </div>

                                <div class="col-lg-5 col-6">
                                    <button type="submit" class="form-control">Envoyé</button>
                                </div>
                            </form>
                        </div>

                        <div class="col-lg-6 col-12 mt-5 ms-auto">
                            <div class="row">
                                <div class="col-6 border-end contact-info">
                                    <h6 class="mb-3">Adresse Email</h6>
                                    <a href="mailto:hello@company.com" class="custom-link">
                                        Hosto-tv@compangy.com
                                        <i class="bi-arrow-right ms-2"></i>
                                    </a>
                                </div>

                                <div class="col-6 contact-info">
                                	<h6 class="mb-3">HostoAwards</h6>
                                    <a href="mailto:studio@company.com" class="custom-link">
                                        HostoAwards@company.com
                                        <i class="bi-arrow-right ms-2"></i>
                                    </a>
                                </div>

                                <div class="col-6 border-top border-end contact-info">
                                    <h6 class="mb-3">Siège sociale</h6>
                                    <p class="text-muted">Cocody Las palmas 00 BP Abj, Mr. Hallah, Côte d'ivoire</p>
                                </div>

                                <div class="col-6 border-top contact-info">
                                    <h6 class="mb-3">Nos réseaux sociaux</h6>
                                    <ul class="social-icon">
                                        <li><a href="#" class="social-icon-link bi-messenger"></a></li>
                                        <li><a href="#" class="social-icon-link bi-youtube"></a></li>
                                        <li><a href="#" class="social-icon-link bi-instagram"></a></li>
                                        <li><a href="#" class="social-icon-link bi-whatsapp"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <script>
            
            const status = sessionStorage.getItem("status");

            if (status === "succes_contact") {
                    
                Swal.fire({
                    title: "Succès !",
                    text: "Message envoyé avec succès !",
                    icon: "success",
                    confirmButtonText: "D'accord !"

                });
                sessionStorage.removeItem("status");
            }

            // -----------------

            if (status === "error_contact_envoi") {
                    
                Swal.fire({
                    title: "Erreur !",
                    text: "Erreur lors de l'envoi du message : Erreur lors de l'envoi du message : ",
                    icon: "error",
                    confirmButtonText: "Réessayer !"
                });
                sessionStorage.removeItem("status");
            }

            // -----------------

            if (status === "error_contact_champ") {
                    
                Swal.fire({
                    title: "Erreur !",
                    text: "Veuillez remplir tous les champs correctement.",
                    icon: "error",
                    confirmButtonText: "Réessayer !"
                });
                sessionStorage.removeItem("status");
            }
        </script> 
<?php include('footer.php');?>