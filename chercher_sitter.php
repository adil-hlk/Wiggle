<?php /* Template Name: Chercher un sitter */
get_header();

// Traitement du formulaire
if ($_GET) {
    $region = isset($_GET['region']) ? sanitize_text_field($_GET['region']) : '';
    $services = isset($_GET['services']) ? sanitize_text_field($_GET['services']) : '';
    $date_de_debut = isset($_GET['date_de_debut']) ? sanitize_text_field($_GET['date_de_debut']) : '';
    $date_de_fin = isset($_GET['date_de_fin']) ? sanitize_text_field($_GET['date_de_fin']) : '';

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

    // Ajouter les filtres de date si des dates sont spécifiées
    if (!empty($date_de_debut)) {
        $args['meta_query'][] = array(
            'key'     => 'date_de_debut',
            'value'   => $date_de_debut,
            'compare' => '<=',
            'type'    => 'DATE',
        );
    }
    if (!empty($date_de_fin)) {
        $args['meta_query'][] = array(
            'key'     => 'date_de_fin',
            'value'   => $date_de_fin,
            'compare' => '>=',
            'type'    => 'DATE',
        );
    }

    // Exécuter la requête
    $user_query = new WP_User_Query($args);

    // Vérifier si des résultats existent
    $sitters = !empty($user_query->get_results()) ? $user_query->get_results() : [];
} else {
    $sitters = get_users_by_role('sitter'); // Par défaut, afficher tous les sitters
}

?>
<main>

    <!-- Section de recherche -->
    <section id="accueil-recherche" class="text-center p-5 col-m-5 bg-custom">
        <h2 class="text-uppercase fw-bold text-start">Rechercher des Sitters</h2>

        <form method="get">
            <!-- Genre de service -->
            <div class="form-group container p-2">
                <label for="services" class="fw-bold">Quel genre de service recherchez-vous ?</label>
                <select class="form-control" id="services" name="services">
                    <option value="">Tous les services</option>
                    <option value="Hébergement">Hébergement</option>
                    <option value="Promenade">Promenade</option>
                    <option value="Garderie">Garderie</option>
                    <option value="Garderie de nuit">Garderie de nuit</option>
                </select>
            </div>

            <!-- Région -->
            <div class="form-group container p-2">
                <label for="region" class="fw-bold">Région</label>
                <input type="text" class="form-control" id="region" name="region" placeholder="Entrez une région">
            </div>

            <!-- Date -->
            <div class="container p-2">
                <div class="row align-items-center">
                    <div class="form-group col-md-6">
                        <label for="date_de_debut" class="fw-bold">Date de début</label>
                        <input type="date" class="form-control" id="date_de_debut" name="date_de_debut">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="date_de_fin" class="fw-bold">Date de fin</label>
                        <input type="date" class="form-control" id="date_de_fin" name="date_de_fin">
                    </div>
                </div>
            </div>
            <br>
            <button type="submit" class="btn-rechercher md-2">Rechercher</button>
        </form>
    </section>

    <!-- Section des résultats -->
    <section>
        <div id="results-cards">
            <?php if (!empty($sitters)) : ?>
                <?php foreach ($sitters as $sitter) : ?>
                    <?php
                    $region = get_user_meta($sitter->ID, 'region', true);
                    $services = get_user_meta($sitter->ID, 'services', true);

                    // Récupération des dates ACF
                    $start_date = get_field('date_de_debut', 'user_' . $sitter->ID);
                    $end_date = get_field('date_de_fin', 'user_' . $sitter->ID);
                    ?>
                    <div class="sitter-card" 
                         data-services="<?php echo esc_attr($services); ?>" 
                         data-region="<?php echo esc_attr($region); ?>">
                         
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('profil')) . '?user_id=' . $sitter->ID); ?>" class="card-link">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo esc_html($sitter->display_name); ?></h5>
                                    <p class="card-text">Service : <?php echo esc_html($services ?: 'Non spécifié'); ?></p>
                                    <p class="card-text">Région : <?php echo esc_html($region ?: 'Non spécifiée'); ?></p>
                                    
                                    <!-- Affichage de la période de disponibilité -->
                                    <?php if ($start_date && $end_date) : ?>
                                        <p class="card-text">
                                            Disponibilité : <?php echo esc_html($start_date); ?> au <?php echo esc_html($end_date); ?>
                                        </p>
                                    <?php else : ?>
                                        <p class="card-text">Disponibilité : Non spécifiée</p>
                                    <?php endif; ?>
                                    
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>Aucun sitter trouvé avec ces critères.</p>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>