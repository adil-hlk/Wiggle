<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/style.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
  <?php wp_head(); ?>
      <script>
        const burgerMenu = document.getElementById('burgerMenu');
        const navLinks = document.querySelector('.nav-links');
    
        burgerMenu.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });
    </script>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

   <!-- Header & nav -->
   <header>
        <nav class="navbar">
            <!-- Logo -->
            <div class="navbar-logo"> 
              <a href="<?php echo home_url('/'); ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo_chien_chat_V2.svg" alt="logo Wiggle"/>
            </a>
            </div>
    
            <!-- Liens de navigation -->
            <ul class="nav-links">
                <li><a href="<?php echo home_url('chercher-un-sitter'); ?>">Chercher un sitter</a></li>
                <li><a href="<?php echo home_url('devenir-un-sitter'); ?>">Devenir un sitter</a></li>
                <li><a href="se-connecter.html">Se connecter/S'inscrire</a></li>
                <li><a href="<?php echo home_url('aide'); ?>">FAQ/Contact</a></li>
            </ul>
    
            <!-- Menu burger -->
            <div class="burger-menu" id="burgerMenu">
                <img src="assets/images/menu-plein.svg" alt="Menu">
            </div>
        </nav>
    </header>