<?php
add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('menus');

register_nav_menu('header', 'En tête du menu');

function styles_scripts()
{
  wp_enqueue_style(
    'bootstrap',
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'
  );
  wp_enqueue_style(
    'style',
    get_template_directory_uri() . '/assets/css/app.css'
  );

  wp_enqueue_script(
    'bootstrap-bundle',
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
    false,
    1,
    true
  );
  wp_enqueue_script(
    'app-js',
    get_template_directory_uri() . '/assets/js/app.js',
    ['bootstrap-bundle'],
    1,
    true
  );
}
add_action('wp_enqueue_scripts', 'styles_scripts');

function enqueue_messagerie_styles() {
  if (is_page_template('messagerie.php')) {
      wp_enqueue_style('messagerie-style', get_template_directory_uri() . '/assets/css/app.css');
  }
}

// agenda/calendrier

function display_availability_form() {
  if (!is_user_logged_in()) {
      return '<p>Veuillez vous connecter pour soumettre vos disponibilités.</p>';
  }

  ob_start(); ?>
  <form method="post">
      <label for="availability_date">Date :</label>
      <input type="date" id="availability_date" name="availability_date" required>
      
      <label for="availability_start_time">Heure de début :</label>
      <input type="time" id="availability_start_time" name="availability_start_time" required>
      
      <label for="availability_end_time">Heure de fin :</label>
      <input type="time" id="availability_end_time" name="availability_end_time" required>
      
      <input type="submit" name="submit_availability" value="Ajouter Disponibilité">
  </form>
  <?php

  return ob_get_clean();
}
add_shortcode('availability_form', 'display_availability_form');

function save_user_availability() {
  if (isset($_POST['submit_availability'])) {
      $user_id = get_current_user_id();
      $date = sanitize_text_field($_POST['availability_date']);
      $start_time = sanitize_text_field($_POST['availability_start_time']);
      $end_time = sanitize_text_field($_POST['availability_end_time']);
      
      $post_id = wp_insert_post(array(
          'post_type' => 'availability',
          'post_title' => "Disponibilité de l'utilisateur $user_id",
          'post_status' => 'publish',
          'post_author' => $user_id,
      ));

      if ($post_id) {
          update_post_meta($post_id, 'availability_date', $date);
          update_post_meta($post_id, 'availability_start_time', $start_time);
          update_post_meta($post_id, 'availability_end_time', $end_time);
      }
  }
}
add_action('init', 'save_user_availability');

//sitter ou chercheur
function get_sitters() {
  global $wpdb;

  $sitters = $wpdb->get_results(
      "SELECT * FROM {$wpdb->users} WHERE is_sitter = 1"
  );

  return $sitters;
}

// Exemple d'utilisation
$sitters = get_sitters();
foreach ($sitters as $sitter) {
  echo "Nom : {$sitter->user_login}, Email : {$sitter->user_email}<br>";
}



// CUSTOM POSTS TYPES




function create_post_type()
{
  register_post_type('faqs', [
    'labels' => ['name' => 'FAQs'],
    'supports' => ['title', 'editor', 'thumbnail'],
    'public' => true,
    'has_archive' => true,
    'rewrite' => ['slug' => 'faqs']
  ]);
  register_post_type('services', [
    'labels' => ['name' => 'Services'],
    'supports' => ['title', 'editor', 'thumbnail'],
    'public' => true,
    'has_archive' => true,
    'rewrite' => ['slug' => 'services']
  ]);
}
add_action('init', 'create_post_type');

// MENUS
function menuheader_class($classes)
{
  $classes[] = 'nav-item';
  return $classes;
}
add_filter('nav_menu_css_class', 'menuheader_class');

function menuheader_link_class($attributes)
{
  $attributes['class'] = 'nav-link';
  return $attributes;
}
add_filter('nav_menu_link_attributes', 'menuheader_link_class');


// Formulaire de connexion

