<?php
/* Template Name: Modifier */

get_header();
?>

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
// Assurez-vous que l'utilisateur est connecté
if (!is_user_logged_in()) {
    wp_redirect(home_url('/Wiggle/connexion/'));
    exit;
}

// Récupérer l'utilisateur actuel
$current_user = wp_get_current_user();
$user_id = $current_user->ID;

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_services'])) {
    try {
        // Vérifiez que l'utilisateur est un sitter
        if (!user_can($user_id, 'sitter')) {
            throw new Exception('Vous n\'avez pas la permission de modifier les services.');
        }

        // Nettoyez et sauvegardez les services
        if (isset($_POST['services']) && is_array($_POST['services'])) {
           // Filtrer les services pour n'inclure que ceux valides
           $available_services = ['Promenade', 'Garderie', 'Garderie de nuit', 'Hébergement'];
           $selected_services = array_filter($_POST['services'], function ($service) use ($available_services) {
               return in_array($service, $available_services, true);
           });

            // Convertir le tableau en chaîne séparée par des virgules
            $services_string = implode(',', $selected_services);
            update_user_meta($user_id, 'services', $selected_services);
        } else {
            update_user_meta($user_id, 'services', []);
        }

        // Redirection après la mise à jour
        wp_redirect(home_url('/Wiggle/mon-profil/')); // Changez l'URL selon vos besoins
        exit;
    } catch (Exception $e) {
        // Gestion des erreurs
        $error_message = $e->getMessage();
    }
}

// Récupérez les services sélectionnés pour pré-remplir le formulaire
$available_services = ['Promenade', 'Garderie', 'Garderie de nuit', 'Hébergement'];
$user_services = get_user_meta($user_id, 'services', true);
$selected_services = !empty($user_services) ? explode(',', $user_services) : [];
?>

<!-- Affichage d'un message d'erreur (si existant) -->
<?php if (!empty($error_message)): ?>
    <div class="error-message" style="color: red;">
        <?php echo esc_html($error_message); ?>
    </div>
<?php endif; ?>






<main>
    <section class="bg-custom1">
        <div class="container">
            <br>
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
                    <input type="submit" name="submit_profile_picture" class="btn-rechercher md-2" value="Modifier ma photo">
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
                <div class="mb-3 p-1">
                    <label for="start_date">Date de début :</label>
                    <input type="date" id="start_date" name="start_date" value="<?php echo esc_attr($start_date); ?>" required>
                    <label for="end_date">Date de fin :</label>
                    <input type="date" id="end_date" name="end_date" value="<?php echo esc_attr($end_date); ?>" required>
                    <button class="btn-rechercher md-2"type="submit" name="update_dates">Mettre à jour</button>
                </div>
                </div>
                </form>
            <!-- Formulaire HTML pour service -->
             <div>
            <form method="post">
                <br>
                 <label for="services" class="form-label fw-bold">Services proposés :</label>
                 <?php foreach ($available_services as $service): ?>
               <div>
               <label>
                <input type="checkbox" name="services[]" value="<?php echo esc_attr($services); ?>"
                <?php echo in_array($service, $selected_services, true) ? 'checked' : ''; ?>>
                <?php echo esc_html($service); ?>
               </label>
               </div>
                  <?php endforeach; ?>
                  <button type="submit" name="update_services" class="btn-rechercher md-2 m-3">Mettre à jour</button>
                
                </form>
            
                </div>
         <br>
    </section>

    <div class="flex-row-reverse p-5">
    <img class="illu-img-moyen" src="<?php echo get_template_directory_uri(); ?>/assets/images/chat-leve-patte.svg" alt="une femme tient son chien en laisse"/>
</div>
            
                 </div>
                 

   
</main>



<?php get_footer(); ?>