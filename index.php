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
          <div class="container">
            <h3 class="text-uppercase fw-bold">Besoin d'un sitter pour surveiller votre boule de poil ?</h3>
          </div>
            <br><a href="<?php echo home_url('chercher-un-sitter'); ?>" class="btn-rechercher md-2" role="button" aria-disabled="true">Chercher un sitter</a>
        </section>

        <section id="services" class="text-center p-5">
            <h2 class="text-uppercase fw-bold text-start">Service pour chien et chat !</h2>
            <div class="row">
                <!-- Hébergement -->
                <div class="col-12 col-lg-6 d-flex align-items-center mb-4">
                    <img class="illu-img-moyen" src="<?php echo get_template_directory_uri(); ?>/assets/images/homme-saute-chat.svg" alt="homme heureux saute sur son chat" width="20%"/>
                    <div>
                        <h4>Hébergement</h4>
                        <p>Votre animal de compagnie logera au domicile du pet-sitter.</p>
                    </div>
                </div>
                <!-- Garderie -->
                <div class="col-12 col-lg-6 d-flex align-items-center mb-4">
                <img class="illu-img-moyen" src="<?php echo get_template_directory_uri(); ?>/assets/images/chat-pelotte.svg" alt="chat sur une pelotte de laine" width="20%"/>
                    <div>
                        <h4>Garderie</h4>
                        <p>Garderie de jour pour votre animal de compagnie.</p>
                    </div>
                </div>
                <!-- Promenade -->
                <div class="col-12 col-lg-6 d-flex align-items-center mb-4">
                <img class="illu-img-moyen" src="<?php echo get_template_directory_uri(); ?>/assets/images/chien-velo.svg" alt="chien sur vélo" width="20%"/>
                    <div>
                        <h4>Promenade</h4>
                        <p>Le sitter viendra à votre domicile et promènera votre animal de compagnie.</p>
                    </div>
                </div>
                <!-- Gardiennage de nuit -->
                <div class="col-12 col-lg-6 d-flex align-items-center mb-4">
                <img class="illu-img-moyen" src="<?php echo get_template_directory_uri(); ?>/assets/images/chat-couché.svg" alt="chat couché" width="20%"/>
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
        <img class="illu-img-moyen" src="<?php echo get_template_directory_uri(); ?>/assets/images/chiensetchatmain.svg" alt="chat et chien se tiennent la main"/>


        </section>

    </main>


<?php get_footer(); ?>