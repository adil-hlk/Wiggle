<?php
$current_user = wp_get_current_user();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = get_current_user_id();

    // Traitement de la biographie
    if (isset($_POST['submit_biography'])) {
        $biography = sanitize_textarea_field($_POST['biography']); // Nettoyer l'entrée
        wp_update_user(array(
            'ID' => $user_id,
            'description' => $biography
        ));
    }
    // Traitement des services 
    if (isset($_POST['services'])) {
        $selected_service = sanitize_text_field($_POST['services']); // Nettoyer l'entrée
        update_user_meta($user_id, 'services', $selected_service);
    }
    
    // Traitement de l'image de profil
    if (isset($_POST['submit_profile_picture']) && !empty($_FILES['profile_picture']['name'])) {
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        $uploaded_file = $_FILES['profile_picture'];

        $upload_overrides = array('test_form' => false);
        $movefile = wp_handle_upload($uploaded_file, $upload_overrides);

        if ($movefile && !isset($movefile['error'])) {
            $attachment = array(
                'guid' => $movefile['url'], 
                'post_mime_type' => $movefile['type'],
                'post_title' => basename($movefile['file']),
                'post_content' => '',
                'post_status' => 'inherit'
            );

            $attachment_id = wp_insert_attachment($attachment, $movefile['file']);
            require_once(ABSPATH . 'wp-admin/includes/image.php');
            $attach_data = wp_generate_attachment_metadata($attachment_id, $movefile['file']);
            wp_update_attachment_metadata($attachment_id, $attach_data);

            // Sauvegarder l'image en tant qu'avatar utilisateur (exemple avec un champ personnalisé)
            update_user_meta($user_id, 'profile_picture', $movefile['url']);
        }
    }
    // Traitement de la région
    if (isset($_POST['region'])) {
        $region = sanitize_text_field($_POST['region']); // Nettoyer l'entrée
        update_user_meta($user_id, 'region', $region);
    }
    if (isset($_POST['services'])) {
        update_user_meta($user_id, 'services', sanitize_text_field($_POST['services']));  }

    wp_redirect(home_url('/mon-profil/'));
    exit;
}
?>
<?php
/* Template Name: Modifier */

get_header();
?>
<main>
    <section>
        <div class="container">
            <h2>Modifier mon profil</h2>
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3 p-1">
                    <label for="profile_picture" class="form-label fw-bold">Photo de profil</label>
                    <input type="file" id="profile_picture" name="profile_picture" class="form-control">
                    <?php
                    $profile_picture = get_user_meta($current_user->ID, 'profile_picture', true);
                    ?>
                </div>
                <div class="mb-3">
                    <input type="submit" name="submit_profile_picture" class="btn btn-primary" value="Modifier ma photo">
                </div>
                <div class="mb-3 p-1">
                    <label for="region" class="form-label fw-bold">Ville</label>
                    <input type="text" id="region" name="region" class="form-control" value="<?php echo esc_attr(get_user_meta($current_user->ID, 'region', true)); ?>">
                </div>
                <div class="mb-3 p-1">
                    <label for="biography" class="form-label fw-bold">Biographie</label>
                    <textarea id="biography" name="biography" class="form-control" rows="5"><?php echo esc_textarea($current_user->description); ?></textarea>
                </div>
                <div class="mb-3 p-1">
                    <label for="services" class="form-label fw-bold">Service proposé</label>
                    <select id="services" name="services" class="form-control">
                        <option value="service1" <?php selected(get_user_meta($current_user->ID, 'services', true), 'service1'); ?>>Hébergement</option>
                        <option value="service2" <?php selected(get_user_meta($current_user->ID, 'services', true), 'service2'); ?>>Promenade</option>
                        <option value="service3" <?php selected(get_user_meta($current_user->ID, 'services', true), 'service3'); ?>>Garderie</option>
                        <option value="service4" <?php selected(get_user_meta($current_user->ID, 'services', true), 'service4'); ?>>Garderie de nuit</option>
                    </select>
                </div>
                <div class="mb-3 p-3">
                    <input type="submit" name="submit_biography" class="btn btn-primary" value="Modifier mes informations">
                </div>
                </div>
            </form>
        </div>
    </section>
</main>



<?php get_footer(); ?>