<?php 
$currentuser = wp_get_current_user() ;
$profile_picture = get_user_meta($current_user->ID,'profile_picture', true);
/* Template Name: Mon Profil */
get_header(); 
?>

<section id="profil" class="propos">
    <div class="row align-item-center">
        <div class="col-md-6">
            <div class="container">
                <div class ="text-uppercase fw-bold pt-3"><?php echo $currentuser -> first_name; ?> <?php echo $currentuser -> last_name; ?></div> <br>
                <?php if ($profile_picture) {
                   echo '<img src="' . esc_url($profile_picture) . '" alt="Photo de profil de ' . esc_attr($current_user->display_name) . '" class="photo-profil">';
                    } else {
                   echo '<img src="' . esc_url(get_template_directory_uri() . '/images/default-avatar.png') . '" alt="Photo de profil par défaut" class="photo-profil">';
                    } 
                ?>
            </div>
            <div>
                <a href="<?php echo home_url('modifier'); ?>">modifier mon profil</a>
            </div>
        </div>
        <div class="col-md-6 align-item-right pt-3">
            <div class="container">
                <div>
                    <h3 class="text-uppercase fw-bold text-start">À propos de <?php echo $currentuser -> first_name;?> <?php echo $currentuser -> last_name; ?></h3>
                    <p class="text-start"><?php echo $currentuser -> description; ?></p>
                </div>
                <div>
                    <div class="row align-items-center pt-3">
                        <h4 class="text-uppercase fw-bold text-start"><?php echo $currentuser -> first_name;?> <?php echo $currentuser -> last_name; ?>
                        <?php
// Vérifie si l'utilisateur est connecté
if (is_user_logged_in()) {
    // Récupère les informations de l'utilisateur connecté
    $current_user = wp_get_current_user();

    // Récupère les rôles de l'utilisateur (un utilisateur peut avoir plusieurs rôles)
    $roles = $current_user->roles;

    // Vérifie le rôle et affiche un message en fonction
    if (in_array('administrator', $roles)) {
        echo "est à la recherche d'un sitter.";
    } elseif (in_array('editor', $roles)) {
        echo "propose ses services en tant que sitter.";
    }
}
?>
</h4>
                </div>
            </div>
        </div>
</section>

<section id="services" class="services p-5">
    <div class="container">
        <h2 class="text-uppercase fw-bold col-9 col-md-11 order-1 order-md-1 text-start"><?php echo $currentuser -> first_name;?> <?php echo $currentuser -> last_name; ?> propose</h2>
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
    <div class="container">
    <h2 class="text-uppercase fw-bold text-start">AVIS</h2>
    </div>
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