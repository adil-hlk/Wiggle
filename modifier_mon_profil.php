

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
        // Traitement du numéro de téléphone
        if (isset($_POST['numero_de_telephone'])) {
            $numero_de_telephone = sanitize_text_field($_POST['numero_de_telephone']); // Nettoyer l'entrée utilisateur
            update_user_meta($user_id, 'numero_de_telephone', $numero_de_telephone);
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
?>


<?php // Traitement du formulaire
if ($_GET) {
    $region = isset($_GET['region']) ? sanitize_text_field($_GET['region']) : '';
    $services = isset($_GET['services']) ? sanitize_text_field($_GET['services']) : '';

    // Construire la requête avec les critères
    $args = array(
        'role'    => 'sitter', // Filtre pour le rôle "sitter"
        'meta_query' => array(
            'relation' => 'AND', // Combine les filtres
        ),
    );

    // Ajouter le filtre par région si une région est spécifiée
    if (!empty($region)) {
        $args['meta_query'][] = array(
            'key'     => 'region',
            'value'   => $region,
            'compare' => 'LIKE', // Recherche partielle
        );
    }

    // Ajouter le filtre par service si un service est spécifié
    if (!empty($services)) {
        $args['meta_query'][] = array(
            'key'     => 'services',
            'value'   => $services,
            'compare' => 'LIKE', // Vérifie que le service est dans la liste
        );
    }

    // Exécuter la requête
    $user_query = new WP_User_Query($args);

    // Vérifier si des résultats existent
    if (!empty($user_query->get_results())) {
        foreach ($user_query->get_results() as $user) {
            echo '<p>' . esc_html($user->display_name) . ' - ' . esc_html(get_user_meta($user->ID, 'region', true)) . '</p>';
        }
    } else {
        echo '<p>Aucun sitter trouvé avec ces critères.</p>';
    }
    
}
?>


<?php
// Récupérer le champ ACF "services" pour l'utilisateur
$user_id = $user->ID; // Remplace $user par l'objet utilisateur actuel
$services = get_field('services', 'user_' . $user_id); // Préfixe "user_" pour les utilisateurs

// Vérifier si des services existent
if (!empty($services)) {
    // Afficher les services (le champ est un tableau)
    echo '<p>Services disponibles : ' . implode('Promenade,Garderie,Garderie de nuit,Hébergement', $services) . '</p>';
} else {
    echo '<p>Services indisponibles.</p>';
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
                    <input type="tel" id="numero_de_telephone" name="numero_de_telephone" class="form-control" value="<?php echo esc_attr(get_user_meta($current_user->ID, 'numero_de_telephone', true)); ?>" pattern="^\+?[0-9\s\-]+$" required>
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
            </form>
            <form method="post">
                    <label for="start_date">Date de début :</label>
                    <input type="date" id="start_date" name="start_date" value="<?php echo esc_attr($start_date); ?>" required>
                    <label for="end_date">Date de fin :</label>
                    <input type="date" id="end_date" name="end_date" value="<?php echo esc_attr($end_date); ?>" required>
                    <button class="btn-rechercher md-2"type="submit" name="update_dates">Mettre à jour</button>
                </div>
            </form>
                

            <!-- Formulaire HTML pour service -->
            <?php
// Récupérer l'utilisateur actuel
$current_user = wp_get_current_user();
$user_id = $current_user->ID;

// Récupérer les services actuels (ACF checkbox)
$available_services = ['Promenade', 'Garderie', 'Garderie de nuit', 'Hébergement'];
$selected_services = get_field('services', 'user_' . $user_id); // Récupérer les services sélectionnés

// Traitement du formulaire lors de la soumission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_services'])) {
    // Vérifier et nettoyer les services envoyés par le formulaire
    $new_services = isset($_POST['services']) ? array_map('sanitize_text_field', $_POST['services']) : [];
    update_field('services', $new_services, 'user_' . $user_id);
}
?>

<form method="post">
    <h3>Services proposés :</h3>
    <?php foreach ($available_services as $service): ?>
        <div>
            <label>
                <input type="checkbox" name="services[]" value="<?php echo esc_attr($service); ?>"
                    <?php echo (is_array($selected_services) && in_array($service, $selected_services)) ? 'checked' : ''; ?>>
                <?php echo esc_html($service); ?>
            </label>
        </div>
    <?php endforeach; ?>
    <button type="submit" name="update_services" class="btn-rechercher md-2">Mettre à jour</button>
</form>

            
                </div>
         <br>
    </section>

    <div class="flex-row-reverse p-5">
    <img class="illu-img-moyen" src="<?php echo get_template_directory_uri(); ?>/assets/images/chat-leve-patte.svg" alt="une femme tient son chien en laisse"/>
</div>
            

                 

   
</main>



<?php get_footer(); ?>