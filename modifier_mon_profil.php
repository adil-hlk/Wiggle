<?php
// Assurez-vous que l'utilisateur est connecté
if (!is_user_logged_in()) {
    wp_redirect(home_url('/Wiggle/connexion/'));
    exit;
}
?>

<?php
$current_user = wp_get_current_user();
$user_id = $current_user->ID;

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

    // Traitement du numéro de téléphone
    if (isset($_POST['numero_de_telephone'])) {
        $numero_de_telephone = sanitize_text_field($_POST['numero_de_telephone']); // Nettoyer l'entrée utilisateur
        update_user_meta($user_id, 'numero_de_telephone', $numero_de_telephone);
       }

    // Traitement des services
    if (isset($_POST['services'])) {
        // Vérifier et nettoyer les services envoyés par le formulaire
        $services = sanitize_text_field($_POST['services']); // Nettoyer l'entrée utilisateur
        update_user_meta($user_id, 'services', $services);
        }

    // Traitement des dates
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_dates'])) {
            // Valider et enregistrer les champs
            if (!empty($_POST['start_date'])) {
                update_field('date_de_debut', sanitize_text_field($_POST['start_date']), 'user_' . $user_id);
            }
            if (!empty($_POST['end_date'])) {
                update_field('date_de_fin', sanitize_text_field($_POST['end_date']), 'user_' . $user_id);
            }
    
            echo '<p>Vos dates de disponibilité ont été mises à jour avec succès.</p>';
        }
    
        // Récupérer les dates actuelles
        $start_date = get_field('date_de_debut', 'user_' . $user_id);
        $end_date = get_field('date_de_fin', 'user_' . $user_id);    

    wp_redirect(home_url('/Wiggle/mon-profil/'));
    exit;
}

?>


<?php
/* Template Name: Modifier */
get_header();
?>

<main>
    <section class="bg-custom1">
        <div class="container">
            <br>
            <h2>Modifier mon profil</h2>
            
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3 p-1">
                    <label for="profile_picture" class="form-label fw-bold">Photo de profil</label>
                    <input type="file" id="profile_picture" name="profile_picture" class="form-control">
                    <?php $profile_picture = get_user_meta($current_user->ID, 'profile_picture', true); ?>
                </div>
                <div class="mb-3">
                    <input type="submit" name="submit_profile_picture" class="btn-rechercher md-2" value="Modifier ma photo">
                </div>
            </form>
            <form method="post">
                <div class="mb-3 p-1">
                    <label for="numero_de_telephone" class="form-label fw-bold">Numéro de téléphone</label>
                    <input type="text" id="numero_de_telephone" name="numero_de_telephone" class="form-control" value="<?php echo esc_attr(get_user_meta($current_user->ID, 'numero_de_telephone', true)); ?>" pattern="^\+?[0-9\s\-]+$" required>
                </div>
                <div class="mb-3 p-1">
                     <label for="region" class="form-label fw-bold">Ville</label>
                    <input type="text" id="region" name="region" class="form-control" value="<?php echo esc_attr(get_user_meta($current_user->ID, 'region', true)); ?>">
                </div>
                <div class="mb-3 p-1">
                    <label for="biography" class="form-label fw-bold">Biographie</label>
                    <textarea id="biography" name="biography" class="form-control" rows="5"><?php echo esc_textarea($current_user->description); ?></textarea>
                </div>
                <div class="mb-3 p-3">
                    <input type="submit" name="submit_biography" class="btn-rechercher md-2" value="Modifier mes informations">
                </div>
            </form>
            <form method="post">
                <div class="mb-3 p-1">
                     <label for="services" class="form-label fw-bold">Service proposé</label>
                     <select id="services" name="services" class="form-control">
                        <option value="Garderie" <?php selected(get_user_meta($current_user->ID, 'services', true), 'option1'); ?>>Garderie</option>
                        <option value="Garderie de nuit" <?php selected(get_user_meta($current_user->ID, 'services', true), 'option2'); ?>>Garderie de nuit</option>
                        <option value="Hébergement" <?php selected(get_user_meta($current_user->ID, 'services', true), 'option3'); ?>>Hébergement</option>
                        <option value="Promenade" <?php selected(get_user_meta($current_user->ID, 'services', true), 'option4'); ?>>Promenade</option>
                    </select>
                </div>
                <button class="btn-rechercher md-2"type="submit" name="update_services">Mettre à jour</button>
            </form>
            <br>
            <form method="post">
                <div class="mb-3 p-1">
                    <label for="start_date">Date de début :</label>
                    <input type="date" id="start_date" name="start_date" value="<?php echo esc_attr($start_date); ?>" required>
                    <label for="end_date">Date de fin :</label>
                    <input type="date" id="end_date" name="end_date" value="<?php echo esc_attr($end_date); ?>" required>
                    <button class="btn-rechercher md-2"type="submit" name="update_dates">Mettre à jour</button>
                </div>
            </form> 
        </div>
        <br>
    </section>

    <div class="flex-row-reverse p-5">
        <img class="illu-img-moyen" src="<?php echo get_template_directory_uri(); ?>/assets/images/chat-leve-patte.svg" alt="une femme tient son chien en laisse"/>
    </div>

</main>

<?php get_footer(); ?>