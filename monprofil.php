<?php 
$currentuser = wp_get_current_user();
$profile_picture = get_user_meta($currentuser->ID, 'profile_picture', true);
/* Template Name: Mon Profil */
get_header(); 
?>

<section id="profil" class="services p-5">
    <div class="container">
        <div class="row align-item-center">
            <div class="col-md-4 align-items-center">
                <div class="container">
                    <?php if ($profile_picture) {
                        echo '<img src="' . esc_url($profile_picture) . '" alt="Photo de profil de ' . esc_attr($currentuser->display_name) . '" class="photo-profil">';
                    } ?>
                </div>
                <div class="text-uppercase fw-bold pt-3">
                    <?php echo esc_html($currentuser->first_name); ?> <?php echo esc_html($currentuser->last_name); ?>
                </div>
            </div>
            <div class="col-md-7 align-items-center">
                <div class="container">
                    <h3 class="text-uppercase fw-bold text-start">À propos de <?php echo esc_html($currentuser->first_name); ?> <?php echo esc_html($currentuser->last_name); ?></h3>
                    <p class="text-start fw-bold">Vit à <?php echo esc_html($currentuser->region); ?></p>
                    <p class="text-start"><?php echo esc_html($currentuser->description); ?></p>
                </div>
                <div class="container">
                    <h4 class="text-uppercase fw-bold text-start">
                    <?php
                        if (is_user_logged_in()) {
                            $roles = $currentuser->roles;

                            if (in_array('chercheur', $roles)) {
                                echo "est à la recherche d'un sitter";
                                echo '<form id="notification-form">';
                                echo '<button class="btn btn-primary" type="submit">Devenir Sitter</button>';
                                echo '</form>';
                            } elseif (in_array('sitter', $roles)) {
                                echo "est un sitter et propose comme service :";
                                echo '<br><br>';
                                echo esc_html($currentuser->services);
                                echo '<br><br>';

                                if (!empty($currentuser->date_de_debut) && !empty($currentuser->date_de_fin)) {
                                    $date_de_debut = date('d/m/Y', strtotime($currentuser->date_de_debut));
                                    $date_de_fin = date('d/m/Y', strtotime($currentuser->date_de_fin));
                                    echo '<small>' . esc_html("du $date_de_debut au $date_de_fin") . '</small>';
                                }
                            }
                        }
                    ?>
                    </h4>
                </div>
            </div>
            <div class="col-md-1">
                <div class="container pb-2">
                    <a href="<?php echo home_url('modifier-le-profil'); ?>">
                        <img class="illu-img-petit" src="<?php echo get_template_directory_uri(); ?>/assets/images/crayon.svg" alt="crayon pour modifier"/>
                    </a>
                </div>
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

<?php get_footer(); ?>
