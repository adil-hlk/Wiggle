<!-- Pied de page -->
    <footer class="footer">
        <div class="footer-top">
            <p class="fw-bold">suivez nous sur nos réseaux</p>
            <div class="footer-icons">
                <a class ="icon-effect" href="<?php echo home_url('mentions-legales'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook-app-round-white-icon.svg" alt="facebook"/></a>
                <a class ="icon-effect2" href="<?php echo home_url('mentions-legales'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram-white-icon.svg" alt="Instagram"/></a>
            </div>
        </div>
        <div class="footer-bottom pb-3">
            <span><a href="<?php echo home_url('chercher-un-sitter'); ?>">Chercher un sitter</a></span>
            <span><a href="<?php echo home_url('devenir-un-sitter'); ?>">Devenir un sitter</a></span>
            <span><a href="<?php echo home_url('aide'); ?>">Aide</a></span>
            <span>@2024 Wiggle | <a href="<?php echo home_url('mentions-legales'); ?>">Mentions Légales</a> - Tous droits réservés.</span> 
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>