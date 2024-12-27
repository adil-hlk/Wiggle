<?php /* Template Name: Chercher un sitter */
get_header();
$sitters = get_users_by_role('sitter');
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
<main>

    <!-- Section de recherche -->
    <section id="accueil-recherche" class="text-center p-5 col-m-5 bg-custom">
        <h2 class="text-uppercase fw-bold text-start">Rechercher des Sitters</h2>

        <form id="search-form">
            <!-- Genre de service -->
            <div class="form-group">
                <label for="services" class="fw-bold">Quel genre de service recherchez-vous ?</label>
                <select class="form-control" id="services">
                    <option value="">Tous les services</option>
                    <option value="Hebergement">Hébergement</option>
                    <option value="Promenade">Promenade</option>
                    <option value="Garderie">Garderie</option>
                    <option value="Garderie de nuit">Garderie de nuit</option>
                </select>
            </div>

            <!-- Région -->
            <div class="form-group">
                <label for="region" class="fw-bold">Région</label>
                <input type="text" class="form-control" id="region" placeholder="Entrez une région">
            </div>

            <!-- Date -->
            <div class="form-group">
                <label for="date" class="fw-bold">À quelle date ?</label>
                <input type="date" class="form-control" id="date">
            </div>

            <br>
            <button type="button" class="btn-rechercher md-2" id="filter-button">Rechercher</button>
            </br>
        </form>
    </section>

    <!-- Section des résultats -->
    <section>
    <div id="results-cards">
        <?php if (!empty($sitters)) : ?>
            <?php foreach ($sitters as $sitter) : ?>
                <?php
                $sitter_phone = get_user_meta($sitter->ID, 'numero_de_telephone', true);
                $region = get_user_meta($sitter->ID, 'region', true);
                $services = get_user_meta($sitter->ID, 'services', true);

                // Récupération des dates ACF
                $start_date = get_field('date_de_debut', 'user_' . $sitter->ID);
                $end_date = get_field('date_de_fin', 'user_' . $sitter->ID);
                ?>
                <div class="sitter-card" 
                     data-service="<?php echo esc_attr($service); ?>" 
                     data-region="<?php echo esc_attr($region); ?>">
                     
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('profil')) . '?user_id=' . $sitter->ID); ?>" class="card-link">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo esc_html($sitter->user_login); ?></h5>
                                <p class="card-text">Email : <?php echo esc_html($sitter->user_email); ?></p>
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
                                <?php
$sitter_phone = get_field('numero_de_telephone', 'user_' . $sitter->ID); // Récupère le numéro de téléphone via ACF
if ($sitter_phone) : ?>
    <p class="card-text">
        <a href="https://api.whatsapp.com/send?phone=<?php echo esc_attr($sitter_phone); ?>&text=<?php echo urlencode('Bonjour, je suis intéressé par vos services !'); ?>" 
           target="_blank" 
           class="btn btn-success">
            Contacter sur WhatsApp
        </a>
    </p>
                            </div>
                           
<?php endif; ?>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>Aucun sitter trouvé.</p>
        <?php endif; ?>
    </div>
</section>
<script>
        // Ajout de la logique pour filtrer les cartes
        document.getElementById('filter-button').addEventListener('click', function () {
            var serviceFilter = document.getElementById('service').value.toLowerCase();
            var regionFilter = document.getElementById('region').value.toLowerCase();
            var dateFilter = document.getElementById('date').value;

            var cards = document.getElementsByClassName('sitter-card');

            for (var i = 0; i < cards.length; i++) {
                var services = cards[i].getAttribute('data-service').toLowerCase();
                var region = cards[i].getAttribute('data-region').toLowerCase();

                if (
                    (serviceFilter === '' || service.includes(serviceFilter)) &&
                    (regionFilter === '' || region.includes(regionFilter))
                ) {
                    cards[i].style.display = '';
                } else {
                    cards[i].style.display = 'none';
                }
            }
        });
    </script>

</main>

<?php get_footer(); ?>

