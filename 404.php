<?php 
    $titre = "page non trouver "; 
    include('entete1.php');
    include('entete2.php');
?>

<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
  <div class="container text-center">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
        <h1 class="display-1">404</h1>
        <h1 class="mb-4">Oups Page Non Trouver</h1>
        <p class="mb-4">
          Nosu sommes navré, la page que vous rechercher est introuvable !!
          réessayer ?
        </p>
        <a class="btn btn-primary py-3 px-5" href="index.php"
          >Aller à l'Accueil</a
        >
      </div>
    </div>
  </div>
</div>

<?php include('footer.php');?>
