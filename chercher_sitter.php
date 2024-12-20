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

            <button type="button" class="btn btn-primary mt-3" id="filter-button">Rechercher</button>
        </form>
    </section>

    <!-- Table des résultats -->
    <section>
        <table id="results-table">
            <thead>
                <tr class="header">
                    <th style="width:40%;">Nom</th>
                    <th style="width:40%;">Email</th>
                    <th style="width:20%;">Service</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($sitters)) : ?>
                    <?php foreach ($sitters as $sitter) : ?>
                        <tr data-service="<?php echo esc_attr(get_user_meta($sitter->ID, 'service', true)); ?>" 
                            data-region="<?php echo esc_attr(get_user_meta($sitter->ID, 'region', true)); ?>"
                            data-date="<?php echo esc_attr(get_user_meta($sitter->ID, 'availability_date', true)); ?>">
                            <td><?php echo esc_html($sitter->user_login); ?></td>
                            <td><?php echo esc_html($sitter->user_email); ?></td>
                            <td><?php echo esc_html(get_user_meta($sitter->ID, 'service', true)); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="3">Aucun sitter trouvé.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </section>

    
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
