

<?php $current_user = wp_get_current_user();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_biography'])) {
    $user_id = get_current_user_id();
    $biography = sanitize_textarea_field($_POST['biography']); // Nettoyer l'entrée

    // Mettre à jour la biographie de l'utilisateur
    wp_update_user(array(
        'ID' => $user_id,
        'description' => $biography
    ));

    wp_redirect(home_url('/mon-profil/'));
    exit;
}
?>
<?php 
/* Template Name: Modifier */

get_header(); 
?>
<main>
    <section>
        <div class="container">
            <h2>Modifier mon profil</h2>
            <form method="post">
                <div class="mb-3">
                    <label for="biography" class="form-label">Biographie</label>
                    <textarea id="biography" name="biography" class="form-control" rows="5"><?php echo esc_textarea($current_user->description); ?></textarea>
                </div>
                <div class="mb-3">
                    <input type="submit" name="submit_biography" class="btn btn-primary" value="Mettre à jour">
                </div>
            </form>
        </div>
    </section>
</main>


<?php get_footer(); ?>