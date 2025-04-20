<?php 
    $titre_appli = 'Foires aux question ' ;

    include('entete1.php');
    include('entete2.php');

    include('traitement/connect_BD.php');
    $sql = "SELECT * FROM faq";
    $result = $conn->query($sql);
?>

            <header class="site-header section-padding d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-12">
                            <h1>
                                <span class="d-block text-primary">Questions fréquentes</span>
                                <span class="d-block text-dark">Santé et Bien-être</span>
                            </h1>
                        </div>
                    </div>
                </div>
            </header>

                <section class="faq section-padding">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-12">
                                <?php
                                $currentCategory = '';
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        if ($currentCategory != $row['category']) {
                                            $currentCategory = $row['category'];
                                            echo "<h2>" . htmlspecialchars($currentCategory) . "</h2>";
                                            echo '<div class="accordion" id="accordion' . str_replace(' ', '', $currentCategory) . '">';
                                        }

                                        echo '<div class="accordion-item">
                                                <h2 class="accordion-header" id="heading' . $row['id'] . '">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion' . $row['id'] . '" aria-expanded="false" aria-controls="accordion' . $row['id'] . '">
                                                        ' . htmlspecialchars($row['question']) . '
                                                    </button>
                                                </h2>
                                                <div id="accordion' . $row['id'] . '" class="accordion-collapse collapse" aria-labelledby="heading' . $row['id'] . '" data-bs-parent="#accordion' . str_replace(' ', '', $currentCategory) . '">
                                                    <div class="accordion-body">
                                                        <p class="large-paragraph">' . nl2br(htmlspecialchars($row['answer'])) . '</p>
                                                    </div>
                                                </div>
                                            </div>';
                                    }
                                    echo '</div>';
                                } else {
                                    echo "Aucune question n'a été trouvée.";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </section>
        </main>

<?php include('footer.php');?>