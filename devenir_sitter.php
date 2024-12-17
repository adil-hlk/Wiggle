<?php 
/* Template Name: Devenir un sitter */
get_header(); 
?>

<div class="container">
    <h1 class="text-uppercase fw-bold text-center">DEVENIR PET SITTER ?<br>COMMENT ?</h1>
</div>
<div class="container">
<img class ="illu-img-grand" src="<?php echo get_template_directory_uri(); ?>/assets/images/chat-pelotte.svg" alt="chat sur une pelotte de laine"/>
</div>

<section id="etapes" class="etapes">
    <h2 class="text-uppercase fw-bold text-center">3 ÉTAPES</h2>
    <div class="container">
        <div class="row align-items-center">
        <div class="col-md-4">
            <img class ="etape" src="<?php echo get_template_directory_uri(); ?>/assets/images/chiffre1.svg" alt="Étape 1"/>
            <h3>Créer votre profil</h3>
            <p>Nous vous guidons dans la création de votre profil en mettant en valeur les informations importantes pour les propriétaires d’animaux. Et vérifier votre compte</p>
        </div>
        <div class="col-md-4">
            <img class ="etape" src="<?php echo get_template_directory_uri(); ?>/assets/images/chiffre2.svg" alt="Étape 2"/>
            <h3>Faites votre agenda</h3>
            <p>Une fois vérifié, précisez les animaux dont vous souhaitez vous occuper aux dates qui vous conviennent. Vous gérez votre emploi du temps comme vous le souhaitez.</p>
        </div>
        <div class="col-md-4">
            <img class ="etape" src="<?php echo get_template_directory_uri(); ?>/assets/images/chiffre3.svg" alt="Étape 3"/>
            <h3>Accepter des requêtes</h3>
            <p>Acceptez des missions et discutez-en avec les autres utilisateurs afin de pouvoir arranger un rendez-vous et convenir des détails du pet-sitting.</p>
        </div>
        </div>
        
    </div>
</section>
<a href="<?php echo home_url('sinscrire'); ?>" class="btn-rechercher md-2" role="button" aria-disabled="true">Créer un compte</a>
<div class="container">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/2pattes.svg" alt="deux pattes qui se touchent" width="50%"/>
</div>

<section id="services" class="services p-5">
    <h2 class="text-uppercase fw-bold text-center">SERVICES</h2>
    <div class="row">
        <div class="col-12 col-lg-6 d-flex align-items-center mb-4">
        <img class="illu-img-moyen" src="<?php echo get_template_directory_uri(); ?>/assets/images/homme-saute-chat.svg" alt="homme heureux saute sur son chat" width="20%"/>
        <div>
                <h3>Hébergement</h3>
                <p>Votre animal de compagnie logera au domicile du pet-sitter.</p>
            </div>
        </div>
        <div class="col-12 col-lg-6 d-flex align-items-center mb-4">
        <img class="illu-img-moyen" src="<?php echo get_template_directory_uri(); ?>/assets/images/chat-pelotte.svg" alt="chat sur une pelotte de laine" width="20%"/>
        <div>
                <h3>Garderie</h3>
                <p>Garderie de jour pour votre animal de compagnie.</p>
            </div>
        </div>
        <div class="col-12 col-lg-6 d-flex align-items-center mb-4">
        <img class="illu-img-moyen" src="<?php echo get_template_directory_uri(); ?>/assets/images/chien-velo.svg" alt="chien sur vélo" width="20%"/>
        <div>
                <h3>Promenade</h3>
                <p>Le sitter viendra à votre domicile et promènera votre animal de compagnie.</p>
            </div>
        </div>
        <div class="col-12 col-lg-6 d-flex align-items-center mb-4">
        <img class="illu-img-moyen" src="<?php echo get_template_directory_uri(); ?>/assets/images/chat-couché.svg" alt="chat couché" width="20%"/>
        <div>
                <h3>Gardiennage de nuit</h3>
                <p>Le sitter logera à votre domicile pendant votre absence.</p>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <h2 class="text-uppercase fw-bold text-center">CONNECTEZ-VOUS ENTRE AMIS DES ANIMAUX</h2>
    <a href="<?php echo home_url('sinscrire'); ?>" class="btn-rechercher md-2" role="button" aria-disabled="true">Créer un compte</a>
</div>  
<div class="container">
    <br><img src="<?php echo get_template_directory_uri(); ?>/assets/images/chien-velo.svg" alt="chien sur vélo" width="60%"/>
</div>

<?php get_footer(); ?>