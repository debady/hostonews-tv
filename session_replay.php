<?php
    //include('traitement/connect_BD.php');
    $sql = "SELECT * FROM replay";
    $stmt = $pdo->query($sql);
    $replays = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

                <!-- style du like replays -->
                <style>
                    /* Style du bouton */
                    .reaction-btn {
                        background-color: #ff6b6b;
                        border: none;
                        color: white;
                        padding: 10px 20px;
                        border-radius: 50px;
                        font-size: 16px;
                        display: flex;
                        align-items: center;
                        cursor: pointer;
                        position: relative;
                        transition: transform 0.3s ease;
                    }

                    .reaction-btn:hover {
                        background-color: #ff4f4f; /* Couleur survol */
                        transform: scale(1.1); /* Agrandir au survol */
                    }

                    .reaction-btn:active {
                        transform: scale(0.95); /* Effet de réduction au clic */
                    }

                    .product-icon {
                        margin-right: 8px;
                        font-size: 20px;
                    }

                    /* Style du compteur de "J'aime" */
                    .reaction-count {
                        font-size: 18px;
                        font-weight: bold;
                        color: #ffdd00; /* Couleur du compteur de J'aime */
                    }

                </style>
                
                <?php foreach ($replays as $replay): ?>
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="product-thumb">
                            <a href="detail_replay.php?id=<?= $replay['id'] ?>">
                                <!-- <iframe 
                                    src="<?= htmlspecialchars($replay['video_url']) ?>" 
                                    frameborder="0" 
                                    allow="autoplay; encrypted-media; loop; picture-in-picture" 
                                    allowfullscreen 
                                    class="img-fluid"
                                    style="width: 100%; height: 300px; border-radius: 10px;">
                                </iframe> -->
                                <video src="<?= htmlspecialchars($replay['video_url']) ?>" controls autoplay loop ></video>
                            </a>
                            <div class="product-top d-flex justify-content-between align-items-center mt-3">
                                <span class="product-alert"><?= htmlspecialchars($replay['alert_label'] ?? '') ?></span>
                                <button class="reaction-btn" data-id="<?= $replay['id'] ?>" onclick="handleReaction(event)">
                                    <i class="bi bi-heart-fill product-icon"></i> 
                                    <span class="reaction-count"><?= htmlspecialchars($replay['reaction_count'] ?? 0) ?></span>
                                </button>
                            </div>

                            <div class="product-info mt-3">
                                <h5 class="product-title mb-2">
                                    <a href="detail_replay.php?id=<?= $replay['id'] ?>" class="product-title-link"><?= htmlspecialchars($replay['title']) ?></a>
                                </h5>
                                <p class="product-p mb-2"><?= htmlspecialchars($replay['description']) ?></p>
                                <small class="product-price text-muted">Publié le : <?= htmlspecialchars($replay['event_date']) ?></small>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

