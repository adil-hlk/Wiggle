<?php 
/* Template Name: mot de passe oublié */
get_header(); 
?>

<main>
    <section class="text-center p-5 bg-custom">
    <div class="container">
    <div class="row">
            <form class="col row justify-content-md-center col-lm-5 col-rm-3 align-items-center">
                <div class="row">
                    <label for="formulaire-à-choix4">
                        <h2 class="text-uppercase fw-bold text-start">VEUILLEZ SAISIR VOTRE ADRESSS E-MAIL POUR RÉINITIALISER VOTRE MOT DE PASSE:</h2>
                    </label>
                  <div class="col">
                    <input type="text" class="form-control" placeholder="email">
                  </div>
                </div>
              </form>
              
          </form>
    </div>
        <br><a href="#" class="btn-rechercher md-2" role="button" aria-disabled="true">envoyer</a>
</div>
</section>
<div class="flex-row-reverse p-5">
    <img class="illu-img-moyen" src="<?php echo get_template_directory_uri(); ?>/assets/images/chien-femme.svg" alt="une femme tient son chien en laisse"/>
</div>
    
</main>

<?php get_footer(); ?>