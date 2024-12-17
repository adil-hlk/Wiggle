<?php 
/* Template Name: S'inscrire */
get_header(); 
?>

<main>

    <section class="text-center p-5 bg-custom1">
        <div class="container">
        <div class="row">
            <h2 class="text-uppercase fw-bold text-start">s'inscrire</h2>
            <form class="col row justify-content-md-center col-lm-5 col-rm-3 align-items-center">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label fw-bold text-start"> nom</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label fw-bold text-start"> prenom</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                  </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label fw-bold text-start">Email</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label fw-bold text-start">mot de passe</label>
                  <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label fw-bold text-start"> confirmer le mot de passe</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                  </div>
                
            </div>
            <br><a href="#" class="btn-rechercher md-2" role="button" aria-disabled="true">s'inscrire</a>
    </div>
              </form>
    
    </section>
    <div class="flex-row-reverse p-5">
        <img class="illu-img-moyen" src="<?php echo get_template_directory_uri(); ?>/assets/images/chien-velo.svg" alt="un homme et son chien sur un vélo"/>
    </div>

</main>

<?php get_footer(); ?>