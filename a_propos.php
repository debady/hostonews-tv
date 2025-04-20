<?php
    include('entete1.php');
    include('entete2.php');
?>
            <section class="team section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="mb-5">La<span> Team</span></h2>
                        </div>
                        <div class="col-lg-4 mb-4 col-12">
                            <div class="team-thumb d-flex align-items-center">
                                <img src="images/Peoples/<?php echo $_SESSION['photo_profil'];?>" class="img-fluid custom-circle-image team-image me-4" alt="">
                                <div class="team-info">
                                    <h5 class="mb-0">Don</h5>
                                    <strong class="text-muted">Product, VP</strong>
                                    <button type="button" class="btn custom-modal-btn" data-bs-toggle="modal" data-bs-target="#don">
                                      <i class="bi-plus-circle-fill"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4 col-12">
                            <div class="team-thumb d-flex align-items-center">
                                <img src="images/Peoples/<?php echo $_SESSION['photo_profil'];?>" class="img-fluid custom-circle-image team-image me-4" alt="">
                                <div class="team-info">
                                    <h5 class="mb-0">Kelly</h5>
                                    <strong class="text-muted">Marketing</strong>
                                    <button type="button" class="btn custom-modal-btn" data-bs-toggle="modal" data-bs-target="#kelly">
                                      <i class="bi-plus-circle-fill"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-lg-0 mb-4 col-12">
                            <div class="team-thumb d-flex align-items-center">
                                <img src="images/Peoples/<?php echo $_SESSION['photo_profil'];?>" class="img-fluid custom-circle-image team-image me-4" alt="">
                                <div class="team-info">
                                    <h5 class="mb-0">Marie</h5>
                                    <strong class="text-muted">Founder</strong>
                                    <button type="button" class="btn custom-modal-btn" data-bs-toggle="modal" data-bs-target="#marie">
                                      <i class="bi-plus-circle-fill"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <header class="site-header section-padding-img site-header-image">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-12 header-info">
                            <h1>
                                <span class="d-block text-primary">Hosto</span>
                                <span class="d-block text-dark">Hosto Tv</span>
                            </h1>
                        </div>
                    </div>
                </div>
                <img src="images/Peoples/<?php echo $_SESSION['photo_profil'];?>" class="header-image img-fluid" alt="">
            </header>

        </main>

        <div class="modal fade" id="don" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0">
                    <div class="modal-header flex-column">
                        <h3 class="modal-title" id="exampleModalLabel">Don Haruko</h3>
                        <h6 class="text-muted">Product, VP</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5 class="mb-4">Over three years in business had the chance to work on variety of projects, with companies</h5>
                        <div class="row mb-4">
                            <div class="col-lg-6 col-12">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                            <div class="col-lg-6 col-12">
                                <p>Incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse commodo viverra.</p>
                            </div>
                        </div>
                        <ul class="social-icon">
                            <li class="me-3"><strong>Where to find?</strong></li>
                            <li><a href="#" class="social-icon-link bi-youtube"></a></li>
                            <li><a href="#" class="social-icon-link bi-whatsapp"></a></li>
                            <li><a href="#" class="social-icon-link bi-instagram"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="kelly" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0">
                    <div class="modal-header flex-column">
                        <h3 class="modal-title" id="exampleModalLabel">Kelly Lisa</h3>
                        <h6 class="text-muted">Global, Head of Marketing</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5 class="mb-4">Over three years in business had the chance to work on variety of projects, with companies</h5>
                        <div class="row mb-4">
                            <div class="col-lg-6 col-12">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                            <div class="col-lg-6 col-12">
                                <p>Incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse commodo viverra.</p>
                            </div>
                        </div>
                        <ul class="social-icon">
                            <li class="me-3"><strong>Where to find?</strong></li>
                            <li><a href="#" class="social-icon-link bi-facebook"></a></li>
                            <li><a href="#" class="social-icon-link bi-instagram"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="marie" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0">
                    <div class="modal-header flex-column">
                        <h3 class="modal-title" id="exampleModalLabel">Marie Sam</h3>
                        <h6 class="text-muted">Founder & CEO</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5 class="mb-4">Over three years in business had the chance to work on variety of projects, with companies</h5>
                        <div class="row mb-4">
                            <div class="col-lg-6 col-12">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                            <div class="col-lg-6 col-12">
                                <p>Incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse commodo viverra.</p>
                            </div>
                        </div>
                        <ul class="social-icon">
                            <li class="me-3"><strong>Where to find?</strong></li>
                            <li><a href="#" class="social-icon-link bi-twitter"></a></li>
                            <li><a href="#" class="social-icon-link bi-linkedin"></a></li>
                            <li><a href="#" class="social-icon-link bi-envelope"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

<?php include('footer.php');?>

