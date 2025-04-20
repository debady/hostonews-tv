<?php 
    $titre_appli = "Replay ";  
    include('entete1.php');
    
    include('entete2.php');
    include('scrolle.php');

?>
        <section class="featured-product section-padding">
        </session>

        <section class="featured-product section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2 class="mb-5">Replay des programmes</h2>
                    </div>
                    <?php include('session_replay.php') ;?>
                    <div class="col-12 text-center">
                        <a href="" class="btn btn-outline-secondary mt-4">Voir Plus</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Styles -->
        <style>
            .section-padding {
                padding: 50px 0;
            }

            .product-thumb {
                background-color: #fff;
                border-radius: 8px;
                padding: 15px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                text-align: center;
            }

            .product-thumb a {
                text-decoration: none;
            }

            .product-alert {
                background-color: #f8d7da;
                color: #721c24;
                padding: 5px 10px;
                border-radius: 5px;
                font-size: 12px;
            }

            .reaction-btn {
                background: none;
                border: none;
                cursor: pointer;
                font-size: 14px;
                color: #ff6b6b;
                display: flex;
                align-items: center;
                gap: 5px;
            }

            .reaction-btn:hover {
                color: #ff4b4b;
            }

            .reaction-count {
                font-size: 14px;
                color: #555;
            }

            .product-title-link {
                font-weight: bold;
                color: #333;
                text-decoration: none;
            }

            .product-title-link:hover {
                text-decoration: underline;
            }

            .comments-section .btn-outline-primary {
                font-size: 14px;
            }

            .comments {
                margin-top: 10px;
            }

            .comments.d-none {
                display: none;
            }

            .comment {
                font-size: 14px;
                border-bottom: 1px solid #ddd;
                padding-bottom: 5px;
                margin-bottom: 5px;
            }
        </style>
    </main>

<?php 
    include('footer.php');
?>