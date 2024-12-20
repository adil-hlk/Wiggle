<?php /* Template Name: Chercher un sitter */
get_header();
$sitters = get_users_by_role('sitter');
?>

<main>

    <!-- Section de recherche -->
    <section id="accueil-recherche" class="text-center p-5 col-m-5 bg-custom">
        <h2 class="text-uppercase fw-bold text-start">Rechercher des Sitters</h2>

        <form id="search-form">
            <!-- Genre de service -->
            <div class="form-group">
                <label for="service" class="fw-bold">Quel genre de service recherchez-vous ?</label>
                <select class="form-control" id="service">
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

    <!-- Table des résultats -->
    <br>
    <section>
    <div id="results-cards" class="row row-cols-4 row-cols-md-3 g-2">
        <?php if (!empty($sitters)) : ?>
            <?php foreach ($sitters as $sitter) : ?>
                <?php
                $region = get_user_meta($sitter->ID, 'region', true);
                $service = get_user_meta($sitter->ID, 'service', true);
                $availability_date = get_user_meta($sitter->ID, 'availability_date', true);
                ?>
                <div class="col sitter-card" 
                     data-service="<?php echo esc_attr($service); ?>" 
                     data-region="<?php echo esc_attr($region); ?>" 
                     data-date="<?php echo esc_attr($availability_date); ?>">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo esc_html($sitter->user_login); ?></h5>
                            <p class="card-text">Email : <?php echo esc_html($sitter->user_email); ?></p>
                            <p class="card-text">Service : <?php echo esc_html($service ?: 'Non spécifié'); ?></p>
                            <p class="card-text">Région : <?php echo esc_html($region ?: 'Non spécifiée'); ?></p>
                            <p class="card-text">Disponibilité : <?php echo esc_html($availability_date ?: 'Non spécifiée'); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>Aucun sitter trouvé.</p>
        <?php endif; ?>
    </div>
    </section>
    </br>

    <script>
       function filterCards() {
        // Récupérer les valeurs du champ de recherche
        var input = document.getElementById("searchInput");
        var filter = input.value.toUpperCase();
        var cards = document.getElementsByClassName("sitter-card");

        // Parcourir toutes les cartes
        for (var i = 0; i < cards.length; i++) {
            var card = cards[i];
            var title = card.querySelector(".card-title").textContent || "";
            var service = card.getAttribute("data-service") || "";
            var region = card.getAttribute("data-region") || "";

            // Vérifier si une des informations correspond au filtre
            if (
                title.toUpperCase().indexOf(filter) > -1 ||
                service.toUpperCase().indexOf(filter) > -1 ||
                region.toUpperCase().indexOf(filter) > -1
            ) {
                card.style.display = ""; // Afficher la carte
            } else {
                card.style.display = "none"; // Cacher la carte
            }
        }
    }
    <script>


    <script>
      document.getElementById('filter-button').addEventListener('click', function () {
    var serviceFilter = document.getElementById('service').value.toLowerCase();
    var regionFilter = document.getElementById('region').value.toLowerCase();
    var dateFilter = document.getElementById('date').value;

    var table = document.getElementById('results-table');
    var rows = table.getElementsByTagName('tr');

    for (var i = 1; i < rows.length; i++) {
        var service = rows[i].getAttribute('data-service').toLowerCase();
        var region = rows[i].getAttribute('data-region').toLowerCase();
        var date = rows[i].getAttribute('data-date');

        if (
            (serviceFilter === '' || service.includes(serviceFilter)) &&
            (regionFilter === '' || region.includes(regionFilter)) &&
            (dateFilter === '' || date === dateFilter)
        ) {
            rows[i].style.display = '';
        } else {
            rows[i].style.display = 'none';
        }
    }
});

    </script>

</main>

<?php get_footer(); ?>
