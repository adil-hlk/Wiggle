<?php
if (is_user_logged_in()) {
    // si je suis déjà connecté je suis redirigé vers la page home
    wp_redirect( home_url('/aide/') );
      exit;
     }
// Vérifie si le formulaire de connexion a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $credentials = array(
        'user_login'    => sanitize_text_field($_POST['username']),
        'user_password' => sanitize_text_field($_POST['password']),
        'remember'      => isset($_POST['remember']) ? true : false,
    );

    // Tente de connecter l'utilisateur
    $user = wp_signon($credentials, false);

    if (is_wp_error($user)) {
        echo 'Erreur : ' . $user->get_error_message();
    } else {
       wp_redirect(home_url('/')) ;
        exit;
    }
}
?>

<?php 
/* Template Name: Se connecter */
get_header(); 
?>

<main>

    <section class="text-center p-5 bg-custom1">
    <div class="container">
    <div class="row">
        <h2 class="text-uppercase fw-bold text-start">se connecter</h2>
        <form class="col row justify-content-md-center col-lm-5 col-rm-3 align-items-center" method="POST" action="">
            <div class="mb-3">
              <label for="username" class="form-label fw-bold text-start">Nom d'utilisateur</label>
              <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label fw-bold text-start">mot de passe</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" name="remember">
              <label class="form-check-label">se souvenir de moi</label>
            </div>
        </div>
        <br><input class="btn-rechercher md-2" type="submit" value ="se connecter">
</div>
          </form>
              <br>
<br> <span class="mx-auto"><a href="<?php echo home_url('mot-de-passe-oublie'); ?>">mot de passe oublié</a></span>
          </form>

</section>
<div class="flex-row-reverse p-5">
    <img class="illu-img-moyen" src="<?php echo get_template_directory_uri(); ?>/assets/images/homme-saute-chat.svg" alt="un homme saute sur son chat"/>
</div>
    
</main>


<?php get_footer(); ?>
