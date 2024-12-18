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

//chatBox
add_action('wp_enqueue_scripts', 'enqueue_messagerie_styles');

function create_chat_table() {
  global $wpdb; // Accès à l'objet global $wpdb.
  $table_name = $wpdb->prefix . 'chat_messages'; // Préfixe WordPress + nom de la table.

  $charset_collate = $wpdb->get_charset_collate(); // Obtenir l'encodage de la base de données.

  // SQL pour créer la table.
  $sql = "CREATE TABLE $table_name (
      id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
      sender_id BIGINT(20) UNSIGNED NOT NULL,
      receiver_id BIGINT(20) UNSIGNED NOT NULL,
      message TEXT NOT NULL,
      created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
      PRIMARY KEY (id)
  ) $charset_collate;";

  require_once(ABSPATH . 'wp-admin/includes/upgrade.php'); // Charger le fichier pour les fonctions d'installation.
  dbDelta($sql); // Exécuter la requête SQL.
}

// Appeler la fonction lors de l'activation du thème ou du plugin.
register_activation_hook(__FILE__, 'create_chat_table');



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

