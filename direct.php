<?php

    $titre_appli = "Direct "; 
    include('entete1.php');
    include('entete2.php');

    include("traitement/connect_BD.php");
    $request = $varConnectBD->prepare("SELECT * FROM direct ");
    $request -> execute(array());

    if($request->rowCount() > 0){
        $reponse = $request->fetch();
        $_SESSION['lurls'] = $reponse['urls'];

    }else {
        $_SESSION['lurls'] = '';
    }
?>


            <section class="related-product section-padding border-top">
            </section>

            <style>
                #emoji-buttons {
                    position: absolute;
                    top: 50%;  
                    left: 50%;  
                    transform: translate(-50%, -50%);
                    display: flex;
                    gap: 10px;  
                    background-color: rgba(0, 0, 0, 0.2);  
                    border-radius: 30px;
                    padding: 10px 20px;
                    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                }

                .emoji-btn {
                    font-size: 30px;
                    background: none;
                    border: none;
                    cursor: pointer;
                    padding: 10px;
                    border-radius: 50%;
                    transition: transform 0.3s ease, background-color 0.3s ease;
                    color: #fff; 
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }

                .emoji-btn:hover {
                    transform: scale(1.2);  
                    background-color: rgba(255, 255, 255, 0.3); 
                }

                .emoji-btn:active {
                    transform: scale(1.1);  
                    background-color: rgba(255, 255, 255, 0.5); 
                }

                .emoji-btn:focus {
                    outline: none;
                    box-shadow: 0 0 0 4px rgba(255, 255, 255, 0.7); 

                }



                /* -------style d'adaptation de la video ----------*/
               .live-section {
                    margin-top: 20px;
                }

                .video-container {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    margin-bottom: 20px;
                }

                .video-wrapper {
                    position: relative;
                    width: 100%;
                    padding-top: 56.25%; 
                }

                .video-frame {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    border: none;
                }

                .comment-section {
                    background-color: #f8f9fa;
                    padding: 15px;
                    border-radius: 8px;
                }

                .comment-section h5 {
                    margin-bottom: 15px;
                    font-weight: bold;
                }

                #comment-form {
                    display: flex;
                    gap: 10px;
                    margin-top: 10px;
                }

                #comment-input {
                    flex: 1;
                }

                .btn-submit {
                    background-color: #007bff;
                    border: none;
                    color: white;
                    padding: 8px 12px;
                    border-radius: 4px;
                    cursor: pointer;
                }

                .btn-submit i {
                    font-size: 18px;
                }

                /* Adaptations pour écrans plus petits */
                @media (max-width: 768px) {
                    .video-wrapper {
                        padding-top: 75%;
                    }

                    .emoji-buttons {
                        bottom: 5px;
                        left: 5px;
                        gap: 5px;
                    }

                    .comment-section {
                        margin-top: 20px;
                    }
                }

            </style>

            <section class="live-section">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-9 col-md-12 video-container">
                            <div class="video-wrapper">
                                <iframe 
                                    class="video-frame"
                                    src="<?php echo $_SESSION['lurls']; ?>" 
                                    title="YouTube Live" 
                                    frameborder="0" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                    allowfullscreen>
                                </iframe>
                                <div id="emoji-buttons" class="emoji-buttons">
                                    <button class="emoji-btn" data-emoji="❤️">❤️</button>
                                    <button class="emoji-btn" data-emoji="😂">😂</button>
                                    <button class="emoji-btn" data-emoji="👏">👏</button>
                                    <button class="emoji-btn" data-emoji="😮">😮</button>
                                </div>
                                <div id="emoji-animation"></div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-12 comment-section">
                            <h5>Commentaires</h5>
                            <div id="comments-section">
                                <!-- Les commentaires s'afficheront ici -->
                            </div>
                            <form id="comment-form">
                                <input id="comment-input" class="form-control" placeholder="Écrire un commentaire..." required />
                                <input type="hidden" id="nom_prenom" value="<?php echo isset($_SESSION['nom_prenom']) ? $_SESSION['nom_prenom'] : 'Anonyme'; ?>">
                                <input type="hidden" id="photo" value="<?php echo isset($_SESSION['photo_profil']) ? $_SESSION['photo_profil'] : 'default' . rand(1, 4) . '.png'; ?>">
                                <input type="hidden" id="utilisateur_id" value="<?php echo isset($_SESSION['id']) ? $_SESSION['id'] : '1'; ?>">
                                
                                <button type="submit" class="btn-submit">
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </main>

<?php include('footer.php');?>
