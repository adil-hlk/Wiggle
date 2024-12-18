<?php 
/* Template Name: liste des profils */
get_header(); 
?>

<main>
    <section class="main bg-custom">
        <div class="container-cards">
            <div class="card" id="c1">
                <img class="illu-img-petit" src="assets/images/loupe.svg" alt="loupe (trouver une pdp)">
                <p class="fw-bold">Christophe</p>
                <p>***** (notation)</p>
                <p>J'ai été agréablement surpris par la gentillesse de mon sitter</p>
            </div>
            <div class="card" id="c2">
                <img class="illu-img-petit" src="assets/images/loupe.svg" alt="loupe (trouver une pdp)">
                <p class="fw-bold">Christophe</p>
                <p>***** (notation)</p>
                <p>J'ai été agréablement surpris par la gentillesse de mon sitter</p>
            </div>
            <div class="card" id="c3">
                <img class="illu-img-petit" src="assets/images/loupe.svg" alt="loupe (trouver une pdp)">
                <p class="fw-bold">Christophe</p>
                <p>***** (notation)</p>
                <p>J'ai été agréablement surpris par la gentillesse de mon sitter</p>
            </div>
            <div class="card" id="c4">
                <img class="illu-img-petit" src="assets/images/loupe.svg" alt="loupe (trouver une pdp)">
                <p class="fw-bold">Christophe</p>
                <p>***** (notation)</p>
                <p>J'ai été agréablement surpris par la gentillesse de mon sitter</p>
            </div>
        </div>
    </section>
    
    <section>
        <img class="illu-img-moyen" src="<?php echo get_template_directory_uri(); ?>/assets/images/chat-couché.svg" alt="chat allongé"/>
    </section>

    <div class="container">
    <?php if (have_posts()): ?>
      <h1>Mes articles</h1>

      <ul>
        <?php while(have_posts()): the_post(); ?>
          <li>
            <?php the_title() ?> - <?php the_author(); ?>
            <a href="<?php the_permalink(); ?>">lire l'article</a>
          </li>
        <?php endwhile; ?>
      </ul>
    <?php else: ?>
      <h1>Aucun articles disponible pour le moment</h1>
    <?php endif; ?>
</div>

</main>

<?php get_footer(); ?>