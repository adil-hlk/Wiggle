<?php 
$currentuser = wp_get_current_user() ;
$profile_picture = get_user_meta($current_user->ID,'profile_picture', true);
/* Template Name: Mon Profil */
get_header(); 
?>

<section id="profil" class="services p-5">
    <div class="container">
        <div class="row align-item-center">
            <div class="col-md-4 align-item-center">
                <div class="container"><?php if ($profile_picture) {
                   echo '<img src="' . esc_url($profile_picture) . '" alt="Photo de profil de ' . esc_attr($current_user->display_name) . '" class="photo-profil">';
                    }
                ?>
                </div>
                <div class ="text-uppercase fw-bold pt-3">
                    <?php echo $currentuser -> first_name; ?> <?php echo $currentuser -> last_name; ?>
                </div>
            </div>
            <div class="col-md-7 align-item-center">
                <div class="container">
                    <h3 class="text-uppercase fw-bold text-start">À propos de <?php echo $currentuser -> first_name;?> <?php echo $currentuser -> last_name; ?></h3>
                    <p class="text-start fw-bold">Vit à <?php echo $currentuser -> region;?></p>
                    <p class="text-start"><?php echo $currentuser -> description; ?></p>
                </div>
                <div class="container">
                    <h4 class="text-uppercase fw-bold text-start">
                        <?php
                            // Vérifie si l'utilisateur est connecté
                            if (is_user_logged_in()) {
                            // Récupère les informations de l'utilisateur connecté
                            $current_user = wp_get_current_user();
                            // Récupère les rôles de l'utilisateur (un utilisateur peut avoir plusieurs rôles)
                            $roles = $current_user->roles;
                            // Vérifie le rôle et affiche un message en fonction
                            if (in_array('chercheur', $roles)) {
                            // Si l'utilisateur est un chercheur, le bouton est affiché
                            echo "est à la recherche d'un sitter";
                            echo '<form id="notification-form">';
                            echo '<button class="btn btn-primary" type="submit">Devenir Sitter</button>';
                            echo '</form>';
                            } elseif (in_array('sitter', $roles)) {
                            echo "propose ses services en tant que sitter.";
                            }
                            }
                        ?>
                </div>

                //Service en checkbox
                <?php
if (is_user_logged_in()) :
    $user_id = get_current_user_id();

    // Sauvegarder les services sélectionnés
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_services'])) {
        $services = isset($_POST['services']) ? array_map('sanitize_text_field', $_POST['services']) : [];
        update_user_meta($user_id, 'user_services', $services);
        echo '<p>Vos services ont été mis à jour avec succès.</p>';
    }

    // Récupérer les services actuels
    $current_services = get_user_meta($user_id, 'user_services', true);
    if (!is_array($current_services)) {
        $current_services = [];
    }
    ?>

    <form method="POST">
        <label for="services">Services proposés :</label><br>
        <div>
            <input type="checkbox" id="hebergement" name="services[]" value="Hébergement" 
                <?php echo in_array('Hébergement', $current_services) ? 'checked' : ''; ?>>
            <label for="hebergement">Hébergement</label>
        </div>
        <div>
            <input type="checkbox" id="garderie" name="services[]" value="Garderie"
                <?php echo in_array('Garderie', $current_services) ? 'checked' : ''; ?>>
            <label for="garderie">Garderie</label>
        </div>
        <div>
            <input type="checkbox" id="promenade" name="services[]" value="Promenade"
                <?php echo in_array('Promenade', $current_services) ? 'checked' : ''; ?>>
            <label for="promenade">Promenade</label>
        </div>
        <div>
            <input type="checkbox" id="gardiennage" name="services[]" value="Gardiennage de nuit"
                <?php echo in_array('Gardiennage de nuit', $current_services) ? 'checked' : ''; ?>>
            <label for="gardiennage">Gardiennage de nuit</label>
        </div>
        <button type="submit" name="update_services">Mettre à jour les services</button>
    </form>

<?php else : ?>
    <p>Veuillez vous connecter pour modifier vos services.</p>
<?php endif; ?>

//mise a jour dans le profil utilisateur
<?php
$current_services = get_user_meta($currentuser->ID, 'user_services', true);

if (!empty($current_services)) {
    echo '<h4>Services proposés :</h4>';
    echo '<ul>';
    foreach ($current_services as $service) {
        echo '<li>' . esc_html($service) . '</li>';
    }
    echo '</ul>';
} else {
    echo '<p>Aucun service proposé pour le moment.</p>';
}
?>



            <div class="col-md-1">
                <div class="container pb-2">
                    <a href="<?php echo home_url('modifier'); ?>"><img class ="illu-img-petit"src="<?php echo get_template_directory_uri(); ?>/assets/images/crayon.svg" alt="modifier"/></a>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/2pattes.svg" alt="deux pattes qui se touchent" width="50%"/>
</div>

<?php
if (is_user_logged_in()) :
    $user_id = get_current_user_id();

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
    ?>

    <form method="POST">
        <label for="start_date">Date de début :</label>
        <input type="date" id="start_date" name="start_date" value="<?php echo esc_attr($start_date); ?>" required>
        
        <label for="end_date">Date de fin :</label>
        <input type="date" id="end_date" name="end_date" value="<?php echo esc_attr($end_date); ?>" required>
        
        <button type="submit" name="update_dates">Mettre à jour</button>
    </form>

<?php else : ?>
    <p>Veuillez vous connecter pour modifier vos disponibilités.</p>
<?php endif; ?>


<section id="Avis" class="text-center p-5 bg-custom1">
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

<section class="container pt-2">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d80598.65185362665!2d4.293016035002747!3d50.855093690325525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3a4ed73c76867%3A0xc18b3a66787302a7!2sBrussels!5e0!3m2!1sen!2sbe!4v1734356104826!5m2!1sen!2sbe" width="90%" height="80%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>

<section  class="container pt-2">
    <h2 class="text-uppercase fw-bold text-start pt-2">disponibilité</h2>
</section>

<?php 
if (in_array('sitter', $current_user->roles)) {
  // Affichez le formulaire et les services
} else {
  echo '<p>Vous devez être un sitter pour proposer des services.</p>';
}
get_footer(); ?>