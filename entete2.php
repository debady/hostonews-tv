<?php 
    // récupère les infos a afficher pour la survole d'emission
    include('recup_entete_emission.php');
?>

<body>

    <section class="preloader">
        <div class="spinner">
            <span class="sk-inner-circle"></span>
        </div>
    </section>

<main>

        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                    <strong>Hosto<span>News</span> TV</strong>
                </a>

                <div class="d-lg-none">
                    <?php 
                        if(isset($_SESSION['acces_token'])){
                            include('includes/photo_profile.php');

                        }else {
                            echo '<a href="connexion.php" class="bi-person custom-icon me-3"></a>
                                <ul class="dropdown-menu">
                                    <li><a href="inscription.php">Inscription</a></li>
                                    <li><a href="connexion.php">Se connecter</a></li>
                                </ul>';
                        }
                    ?>
                </div>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link active " href="index.php">Accueil</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="direct.php">Direct</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="replay.php">Replay</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link" href="programme.php">Programmes</a>
                        </li>
<!--                         
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="magasine/hostomags.php">hostomags</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link" href="magasine display/hostomag2.php">hostomag2</a>
                        </li> -->

                        <li class="nav-item dropdown">
                            <a class="nav-link" href="emission.php">Emission</a>
                            <ul class="dropdown-menu">
                                <?php
                                    $categories = [];
                                    foreach ($emissions as $emission) {
                                        $categories[$emission['categorie']][] = $emission;
                                    }
                                    
                                    foreach ($categories as $categorie => $emissions) {
                                        echo '<li class="dropdown-submenu">';
                                        echo '<a href="category_emission.php?category=' . urlencode($categorie) . '">';
                                        echo '<img src="images/slideshow/emission/' . htmlspecialchars($emissions[0]['image1']) . '" alt="' . htmlspecialchars($categorie) . '" class="menu-icon"> ';
                                        echo htmlspecialchars($categorie);
                                        echo '</a>';
                                        echo '<ul class="dropdown-menu">';
                                        foreach ($emissions as $emission) {
                                            echo '<li><a href="detail_emission.php?id=' . $emission['id'] . '">Episode ' . htmlspecialchars($emission['episode']) . ' - ' . htmlspecialchars($emission['titre']) . '</a></li>';
                                        }
                                        echo '</ul>';
                                        echo '</li>';
                                    }
                                ?>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <div class="d-none d-lg-block">                        
                                <select id="country-select" onchange="changeFlag()">
                                    <option value="ci" data-flag="https://flagcdn.com/w320/ci.png">Côte d'Ivoire</option>
                                    <option value="bf" data-flag="https://flagcdn.com/w320/bf.png">Burkina Faso</option>
                                    <option value="gh" data-flag="https://flagcdn.com/w320/gh.png">Ghana</option>
                                    <option value="gm" data-flag="https://flagcdn.com/w320/gm.png">Gambie</option>
                                    <option value="gn" data-flag="https://flagcdn.com/w320/gn.png">Guinée</option>
                                    <option value="gw" data-flag="https://flagcdn.com/w320/gw.png">Guinée-Bissau</option>
                                    <option value="lr" data-flag="https://flagcdn.com/w320/lr.png">Liberia</option>
                                    <option value="ml" data-flag="https://flagcdn.com/w320/ml.png">Mali</option>
                                    <option value="mr" data-flag="https://flagcdn.com/w320/mr.png">Mauritanie</option>
                                    <option value="ne" data-flag="https://flagcdn.com/w320/ne.png">Niger</option>
                                    <option value="ng" data-flag="https://flagcdn.com/w320/ng.png">Nigeria</option>
                                    <option value="sn" data-flag="https://flagcdn.com/w320/sn.png">Sénégal</option>
                                    <option value="sl" data-flag="https://flagcdn.com/w320/sl.png">Sierra Leone</option>
                                    <option value="tg" data-flag="https://flagcdn.com/w320/tg.png">Togo</option>
                                    <option value="cv" data-flag="https://flagcdn.com/w320/cv.png">Cap-Vert</option>
                                    <option value="bj" data-flag="https://flagcdn.com/w320/bj.png">Bénin</option>
                                </select>

                                <!-- Drapeau et code du pays  -->
                                <a href="profile.php" id="country-link">
                                    <img id="country-flag" src="https://flagcdn.com/w320/ci.png" alt="Drapeau" width="40px" style="border-radius:30px;">
                                    <span id="country-code">CI</span>
                                </a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <?php 
                                if(isset($_SESSION['acces_token'])){
                                    include('includes/photo_profile.php');

                                }else {
                                    echo '<a href="connexion.php" class="bi-person custom-icon me-3"></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="inscription.php">Inscription</a></li>
                                            <li><a href="connexion.php">Se connecter</a></li>
                                        </ul>';
                                }
                            ?>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="admin.php">admin</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
