<?php 
/* Template Name: mot de passe oublié */
get_header(); 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $email = sanitize_email($_POST['email']);
    $user = get_user_by('email', $email);

    if ($user) {
        // Envoi de l'email de réinitialisation de mot de passe
        $reset_key = get_password_reset_key($user);

        if (!is_wp_error($reset_key)) {
            $reset_url = home_url('/reset-password/?key=' . $reset_key . '&login=' . rawurlencode($user->user_login));
            $message = "Bonjour, \n\nCliquez sur le lien suivant pour réinitialiser votre mot de passe : $reset_url \n\nCordialement, \nL'équipe du site.";
            wp_mail($email, 'Réinitialisation de mot de passe', $message);
        }

        // Redirection avec message de confirmation
        wp_redirect(home_url('/mot-de-passe-oublie/?status=success'));
        exit;
    } else {
        $error_message = "Aucun utilisateur trouvé avec cet email.";
    }
}

// Affichage du message de succès ou d'erreur
$success_message = '';
if (isset($_GET['status']) && $_GET['status'] === 'success') {
    $success_message = "Un email de réinitialisation a été envoyé avec succès. Vérifiez votre boîte de réception.";
}
?>

<main>
    <section class="text-center p-5 bg-custom">
        <div class="container">
            <div class="row">
                <!-- Formulaire de réinitialisation -->
                <form method="post" action="" class="col row justify-content-md-center col-lm-5 col-rm-3 align-items-center">
                    <div class="row">
                        <label for="email">
                            <h2 class="text-uppercase fw-bold text-start">Veuillez saisir votre adresse e-mail pour réinitialiser votre mot de passe :</h2>
                        </label>
                        <div class="col">
                            <input type="email" id="email" name="email" class="form-control" placeholder="Adresse e-mail" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </div>
                    </div>
                </form>

                <!-- Message de succès -->
                <?php if (!empty($success_message)): ?>
                    <p class="text-success mt-3"><?php echo esc_html($success_message); ?></p>
                <?php endif; ?>

                <!-- Message d'erreur -->
                <?php if (!empty($error_message)): ?>
                    <p class="text-danger mt-3"><?php echo esc_html($error_message); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <div class="flex-row-reverse p-5">
        <img class="illu-img-moyen" src="<?php echo get_template_directory_uri(); ?>/assets/images/chien-femme.svg" alt="Une femme tient son chien en laisse" />
    </div>
</main>

<?php get_footer(); ?>