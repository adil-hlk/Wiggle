<?php 
/* Template Name: Se connecter */
get_header(); 
?>

<main>
    <section class="text-center p-5 bg-custom1">
    <div class="container">
    <div class="row">
        <h2 class="text-uppercase fw-bold text-start">se connecter</h2>
        <form class="col row justify-content-md-center col-lm-5 col-rm-3 align-items-center">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label fw-bold text-start">Email</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label fw-bold text-start">mot de passe</label>
              <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">se souvenir de moi</label>
            </div>
        </div>
        <br><a href="#" class="btn-rechercher md-2" role="button" aria-disabled="true">se connecter</a>
</div>
          </form>
              <br>
<br> <span class="mx-auto"><a href="#">mot de passe oublié</a></span>
          </form>

</section>
<div class="flex-row-reverse p-5">
    <img class="illu-img-moyen" src="<?php echo get_template_directory_uri(); ?>/assets/images/homme-saute-chat.svg" alt="un homme saute sur son chat"/>
</div>
    
</main>

<?php get_footer(); ?>
