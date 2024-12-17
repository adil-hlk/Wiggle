<?php /* Template Name: Chercher un sitter */
get_header();
 ?>

    <main>
        <section id="accueil-recherche" class="text-center p-5 col-m-5 bg-custom">
            <h2 class="text-uppercase fw-bold text-start">RECHERCHER</h2>
        


        <div class="row">
            <form class="col row justify-content-md-center col-lm-5 col-rm-5 align-items-center">
                <div class="form-group">
                    <label for="formulaire-à-choix1" class="fw-bold">Quel genre de service rechercher vous ?</label>
                    <select class="form-control" id="formulaire-à-choix1">
                      <option>Hebergement</option>
                      <option>Promenade</option>
                      <option>Garderie</option>
                      <option>garderie de nuit</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="formulaire-à-choix2" class="fw-bold">Pour combien d'animaux ?</label>
                    <select class="form-control" id="formulaire-à-choix2">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                <div class="form-group">
                  <label for="formulaire-à-choix3" class="fw-bold">Région</label>
                  <textarea class="form-control" id="formulaire-à-choix3"></textarea>
                </div>
        </div>
        <div class="row">
                <form class="col row justify-content-md-center col-lm-5 col-rm-5 align-items-center">
                    <div class="row">
                        <label for="formulaire-à-choix4" class="fw-bold">À quelle date ?</label>
                      <div class="col">
                        <input type="text" class="form-control" placeholder="Jour">
                      </div>
                      <div class="col">
                        <input type="text" class="form-control" placeholder="Mois">
                      </div>
                    </div>
                  </form>

              </form>
        </div>
            <br><a href="#" class="btn-rechercher md-2" role="button" aria-disabled="true">rechercher</a>
        </section>
        <div>
            <img class ="illu-img-grand" src="<?php echo get_template_directory_uri(); ?>/assets/images/chat-pelotte.svg" alt="chat sur une pelotte de laine"/>
        </div>


    </main>

<?php get_footer(); ?>