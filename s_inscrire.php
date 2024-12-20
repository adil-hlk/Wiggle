<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = sanitize_text_field($_POST['username']);
    $email = sanitize_email($_POST['email']);
    $firstname = sanitize_text_field ($_POST['first_name']);
    $lastname = sanitize_text_field ($_POST['lastname']);
    $password = sanitize_text_field($_POST['password']);

    // Vérifie les champs requis
    if (!username_exists($username) && is_email($email) && !email_exists($email)) {
        // Crée un nouvel utilisateur
        $user_id = wp_create_user($username, $password, $email);
        if (!is_wp_error($user_id)) {
            update_user_meta($user_id,'first_name', $firstname);
            update_user_meta($user_id, 'last_name', $lastname);
            wp_redirect(home_url('/se-connecter/'));
            exit;
        } else {
            echo 'Erreur : ' . $user_id->get_error_message();
        }
    } else {
        echo 'Erreur : Nom d\'utilisateur ou email déjà utilisé.';
    }
}
?>

<?php 
/* Template Name: S'inscrire */
get_header(); 
?>

<main>


    <section class="text-center p-5 bg-custom1">
        <div class="container">
        <div class="row">
            <h2 class="text-uppercase fw-bold text-start">s'inscrire</h2>
              <form class="col row justify-content-md-center col-lm-5 col-rm-3 align-items-center" method ="POST" action="">
                <div class="mb-3">
                    <label for="username" class="form-label fw-bold text-start"> nom d'utilisateur</label>
                    <input type="text" class="form-control" name="username" id="username" required>
                </div>
                <div class="mb-3">
                    <label for="first_name" class="form-label fw-bold text-start"> Prénom</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" required>
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label fw-bold text-start"> Nom</label>
                    <input type="text" class="form-control" name="lastname" id="lastname" required>
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label fw-bold text-start">Email</label>
                  <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label fw-bold text-start">mot de passe</label>
                  <input type="password" class="form-control" name="password" id="password">
                </div>
        </div>
            <br><input type="submit" class="btn-rechercher md-2" value="s'inscrire">
    </div>
              </form>
    
    </section>
    <div class="flex-row-reverse p-5">
        <img class="illu-img-moyen" src="<?php echo get_template_directory_uri(); ?>/assets/images/chien-velo.svg" alt="un homme et son chien sur un vélo"/>
    </div>

</main>

<?php get_footer(); ?>