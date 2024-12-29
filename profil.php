<?php
/* Template Name: Profil*/

get_header();

if (isset($_GET['user_id'])) {
    $sitter_id = intval($_GET['user_id']);
    $sitter = get_userdata($sitter_id);

    if ($sitter) {
        $region = get_user_meta($sitter->ID, 'region', true);
        $services = get_user_meta($sitter->ID, 'services', true);
        $start_date = get_field('date_de_debut', 'user_' . $sitter->ID);
        $end_date = get_field('date_de_fin', 'user_' . $sitter->ID);
    } else {
        echo "<p>Sitter non trouvé.</p>";
    }
} else {
    echo "<p>Paramètre user_id manquant.</p>";
}
?>

<main>
    <?php if ($sitter): ?>
        <section class="profile-details text-center p-5 bg-custom">
            <div class="container">
                <h2 class="text-uppercase fw-bold text-start pt-2">Profil de <?php echo esc_html($sitter->first_name); ?> <?php echo esc_html($sitter->last_name); ?></h2>
                <p class="fw-bold">Région : <?php echo esc_html($region ?: 'Non spécifiée'); ?></p>
                <p class="fw-bold">Service : <?php echo esc_html($services ?: 'Non spécifié'); ?></p>
                <p class="fw-bold">Disponibilité : <?php echo esc_html($start_date); ?> au <?php echo esc_html($end_date); ?></p>
                <p class="card-text">
                    <a href="https://api.whatsapp.com/send?phone=<?php echo esc_attr($sitter_phone); ?>&text=<?php echo urlencode('Bonjour, je suis intéressé par vos services !'); ?>" 
                        target="_blank" 
                        class="btn btn-success">
                        Contacter sur WhatsApp
                    </a>
                </p>
            </div>
        </section>

        <br> <section id="Avis" class="text-center p-5 bg-custom1">
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

<div class="flex-row-reverse p-5">
    <img class="illu-img-moyen" src="<?php echo get_template_directory_uri(); ?>/assets/images/chientiremaitre.svg" alt="une femme tient son chien en laisse"/>
</div>




    <?php endif; ?>
</main>

<?php get_footer(); ?>
