<?php
/* Template Name: Profil Sitter */

get_header();

if (isset($_GET['user_id'])) {
    $sitter_id = intval($_GET['user_id']);
    $sitter = get_userdata($sitter_id);

    if ($sitter) {
        $region = get_user_meta($sitter->ID, 'region', true);
        $service = get_user_meta($sitter->ID, 'service', true);
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
        <section class="profile-details">
            <h1>Profil de <?php echo esc_html($sitter->user_login); ?></h1>
            <p>Email : <?php echo esc_html($sitter->user_email); ?></p>
            <p>Région : <?php echo esc_html($region ?: 'Non spécifiée'); ?></p>
            <p>Service : <?php echo esc_html($service ?: 'Non spécifié'); ?></p>
            <?php if ($start_date && $end_date): ?>
                <p>Disponibilité : <?php echo esc_html($start_date); ?> au <?php echo esc_html($end_date); ?></p>
            <?php else: ?>
                <p>Disponibilité : Non spécifiée</p>
            <?php endif; ?>
        </section>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
