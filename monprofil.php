<?php 
$currentuser = wp_get_current_user();
/* Template Name: Mon Profil */
get_header(); 
?>

<section id="profil">
    <div class="container p-5">
        <div class="album-card">
            <div class="album-photo">
                <p class="p-5">album</p>
            </div>
            <div class="profile-photo">
                <p class="p-4">photo</p>
            </div>
            <div class="user-name">
                <?php echo $currentuser -> ID;?>
            </div>
        </div>
    </div>
</section>

<section id="propos" class="propos">
    <div class="container">
    <div class="row">
        <h2 class="text-uppercase fw-bold col-9 col-md-11 order-1 order-md-1 text-start">À propos de XXX</h2>
        <img class="col-3 col-md-1 order-2 order-md-2 justify-content-md-end d-flex" src="assets/images/crayon.svg" alt="modifier" width="50%">
    </div>
    </div>
    <p class="text-start">Passionnée par les animaux depuis toujours, je suis une étudiante en médecine vétérinaire qui adore passer du temps avec nos amis à poils. Que ce soit pour une promenade, une garde de nuit ou simplement une visite câline, je m'assure que chaque compagnon se sente aimé et en sécurité. J’habite à proximité d’un grand parc, parfait pour les promenades !</p>
</section>

<section class="container">
    <div class="row align-items-center">
    <h2 class="text-uppercase fw-bold text-start">XXX peut prendre en charge</h2>
    
    </div>
    <div class="row align-items-center">
            <img class="col-2 col-md-2" src="assets/images/crayon.svg" alt="modifier" width="50%">
            <img class="col-4 col-md-4" src="assets/images/chat-couché.svg" alt="chien">
            <img class="col-4 col-md-4" src="assets/images/chien-femme.svg" alt="chat">
    </div>
</section>

<section id="services" class="services p-5">
    <div class="row align-items-center">
        <h2 class="text-uppercase fw-bold col-9 col-md-11 order-1 order-md-1 text-start">XXX propose</h2>
        <img class="col-3 col-md-1 order-2 order-md-2 justify-content-md-end d-flex" src="assets/images/crayon.svg" alt="modifier" width="50%">
    </div>
    <div class="row">
        <div class="col-12 col-lg-6 d-flex align-items-center mb-4">
        <img class="illu-img-moyen" src="<?php echo get_template_directory_uri(); ?>/assets/images/homme-saute-chat.svg" alt="homme heureux saute sur son chat" width="20%"/>
        <div>
                <h3>Hébergement</h3>
                <p>Votre animal de compagnie logera au domicile du pet-sitter.</p>
            </div>
        </div>
        <div class="col-12 col-lg-6 d-flex align-items-center mb-4">
        <img class="illu-img-moyen" src="<?php echo get_template_directory_uri(); ?>/assets/images/chat-pelotte.svg" alt="chat sur une pelotte de laine" width="20%"/>
        <div>
                <h3>Garderie</h3>
                <p>Garderie de jour pour votre animal de compagnie.</p>
            </div>
        </div>
        <div class="col-12 col-lg-6 d-flex align-items-center mb-4">
        <img class="illu-img-moyen" src="<?php echo get_template_directory_uri(); ?>/assets/images/chien-velo.svg" alt="chien sur vélo" width="20%"/>
        <div>
                <h3>Promenade</h3>
                <p>Le sitter viendra à votre domicile et promènera votre animal de compagnie.</p>
            </div>
        </div>
        <div class="col-12 col-lg-6 d-flex align-items-center mb-4">
        <img class="illu-img-moyen" src="<?php echo get_template_directory_uri(); ?>/assets/images/chat-couché.svg" alt="chat couché" width="20%"/>
        <div>
                <h3>Gardiennage de nuit</h3>
                <p>Le sitter logera à votre domicile pendant votre absence.</p>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/2pattes.svg" alt="deux pattes qui se touchent" width="50%"/>
</div>

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

<section class="container pt-2">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d80598.65185362665!2d4.293016035002747!3d50.855093690325525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3a4ed73c76867%3A0xc18b3a66787302a7!2sBrussels!5e0!3m2!1sen!2sbe!4v1734356104826!5m2!1sen!2sbe" width="90%" height="80%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>

<section  class="container pt-2">
    <h2 class="text-uppercase fw-bold text-start pt-2">disponibilité</h2>
</section>


<?php get_footer(); ?>