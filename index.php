<?php get_header(); ?>


<main>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/homme-chien-chat.svg" alt="illustration d'un maitre et son chien"/>
                </div>
                <div class="col-md-6">
                    <h1 class="p-2 g-col-6">Un lien de confiance, pour des services de cœur à deux pas de chez vous.</h1>
                </div>
            </div>
        </div>
        <section id="accueil-recherche" class="text-center p-5 col-m-5 bg-custom">
            <h2 class="text-uppercase fw-bold text-start">RECHERCHER</h2>
        


        <div class="row">
            <form class="col row justify-content-md-center col-lm-5 col-rm-5 align-items-center">
                <div class="form-group">
                    <label for="formulaire-à-choix1" class="fw-bold">Quel genre de service recherchez-vous ?</label>
                    <select class="form-control" id="formulaire-à-choix1">
                      <option>Hébergement</option>
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
                        <label for="formulaire-à-choix4" class="fw-bold">Á quelle date</label>
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
            <br><a href="liste_profil.html" class="btn-rechercher md-2" role="button" aria-disabled="true">rechercher</a>
        </section>

        <section id="services" class="text-center p-5">
            <h2 class="text-uppercase fw-bold text-start">Service pour chien et chat !</h2>
            <div class="row">
                <!-- Hébergement -->
                <div class="col-12 col-lg-6 d-flex align-items-center mb-4">
                    <img class="illu-img-petit me-3" src="assets/images/homme-saute-chat.svg" alt="homme heureux saute sur son chat">
                    <div>
                        <h4>Hébergement</h4>
                        <p>Votre animal de compagnie logera au domicile du pet-sitter.</p>
                    </div>
                </div>
                <!-- Garderie -->
                <div class="col-12 col-lg-6 d-flex align-items-center mb-4">
                    <img class="illu-img-petit me-3" src="assets/images/chat-pelotte.svg" alt="chat sur pelotte de laine">
                    <div>
                        <h4>Garderie</h4>
                        <p>Garderie de jour pour votre animal de compagnie.</p>
                    </div>
                </div>
                <!-- Promenade -->
                <div class="col-12 col-lg-6 d-flex align-items-center mb-4">
                    <img class="illu-img-petit me-3" src="assets/images/chien-velo.svg" alt="chien sur vélo">
                    <div>
                        <h4>Promenade</h4>
                        <p>Le sitter viendra à votre domicile et promènera votre animal de compagnie.</p>
                    </div>
                </div>
                <!-- Gardiennage de nuit -->
                <div class="col-12 col-lg-6 d-flex align-items-center mb-4">
                    <img class="illu-img-petit me-3" src="assets/images/chat-couché.svg" alt="chat couché">
                    <div>
                        <h4>Gardiennage de nuit</h4>
                        <p>Le sitter logera à votre domicile pendant votre absence.</p>
                    </div>
                </div>
            </div>
        </section>
        

        <section id="Avis" class="text-center p-5 bg-custom1">
            
            <h2 class="text-uppercase fw-bold text-start">AVIS</h2>
            <div class="carousel-container">
                <div class="container1">
                  <div class="glass" data-text="Avis de Paul : Excellent service !">
                    <p>Paul : "Mon chien a été traité comme un roi, super expérience !"</p>
                  </div>
                  <div class="glass" data-text="Avis de Marie : Très satisfait !">
                    <p>Marie : "Le pet-sitter était attentionné et très professionnel."</p>
                  </div>
                  <div class="glass" data-text="Avis de Ahmed : Parfait !">
                    <p>Ahmed : "Je recommande, mon chat s'est senti à l'aise dès le départ."</p>
                  </div>
                </div>
              </div>
              
        </section>
        <section class="text-center p-5">

            <img class="illu-img-moyen" src="assets/images/chiensetchatmain.svg" alt="chien et se tiennent la main">


        </section>

    </main>


<?php get_footer(); ?>