<?php 
/* Template Name: Mentions Légales */
get_header(); 
?>

    <main>
    <section class="infos">
    <div class="legale">
    <div class="container">
        <div class="row">
            <h1  class="text-uppercase fw-bold col-10 col-md-11 order-1 order-md-1 text-start">POLITIQUE ET CONFIDENTIALITÉ</h1>
            <img class="col-2 col-md-1 order-2 order-md-2 justify-content-md-end d-flex" src="<?php echo get_template_directory_uri(); ?>/assets/images/drapeau.svg" alt="drapeau"/>
        </div>
    </div>
    <div class="container">
    <p class="mentions">Dernière mise à jour : 30/12/2024 <br>Chez Wiggle, nous prenons la confidentialité de vos données très au sérieux. Cette politique décrit comment nous collectons, utilisons, stockons et protégeons vos informations personnelles lorsque vous utilisez notre site ou nos services.</p>
    </div>

    <div class="container">
        <dl>
            <dt>1. Collecte des informations</dt>
            <dd>
                Nous collectons les informations suivantes :
                <ul>
                    <li>Informations personnelles : nom, adresse e-mail, numéro de téléphone, localisation (pour connecter pet-sitters et propriétaires d’animaux).</li>
                    <li>Informations liées à l’utilisation : historique de navigation sur le site, interactions avec les profils, messages échangés.</li>
                </ul>
            </dd>
        </dl>

        <dl>
            <dt>2. Utilisation des informations</dt>
            <dd>
                Vos données sont utilisées pour :
                <ul>
                    <li>Connecter les utilisateurs avec des services pertinents (ex. recherche de pet-sitters).</li>
                    <li>Améliorer l’expérience utilisateur grâce à des recommandations personnalisées.</li>
                    <li>Garantir la sécurité de notre plateforme (vérifications et modérations).</li>
                    <li>Vous envoyer des communications (newsletters, notifications importantes).</li>
                </ul>
            </dd>
        </dl>

        <dl>
            <dt>3. Partage des informations</dt>
            <dd>
                Nous partageons vos informations uniquement dans les cas suivants :
                <ul>
                    <li>Avec d’autres utilisateurs dans le cadre de la mise en relation (ex. coordonnées après confirmation d’un service).</li>
                    <li>Avec des partenaires de confiance pour le traitement des paiements ou l’hébergement du site</li>
                    <li>Si requis par la loi ou pour protéger nos droits.</li>
                </ul>
            </dd>
        </dl>

        <dl>
            <dt>4. Sécurité des données</dt>
            <dd>Nous utilisons des technologies avancées pour protéger vos données (cryptage SSL, pare-feu, etc.). Cependant,ce méthode de transmission ou de stockage n’est totalement sécurisée. Nous vous encourageons à utiliser un mot de passe fort et à ne jamais partager vos informations de connexion.</dd>
        </dl>

        <dl>
            <dt>5. Vos droits</dt>
            <dd>
                Vous pouvez à tout moment :
                <ul>
                    <li>Accéder, corriger ou supprimer vos informations personnelles.</li>
                    <li>Vous opposer au traitement de vos données ou limiter leur utilisation.</li>
                    <li>Retirer votre consentement pour des communications marketing.</li>
                </ul>
                Pour exercer vos droits, contactez-nous ici : <address><a href="mailto:info@buildasite.be">info@buildasite.be</a></address>
            </dd>
        </dl>

        <dl>
            <dt>6. Cookies</dt>
            <dd>
                Notre site utilise des cookies pour :
                <ul>
                    <li>Analyser le trafic et améliorer la navigation.</li>
                    <li>Fournir des recommandations personnalisées.</li>
                </ul>
                Vous pouvez gérer vos préférences de cookies via les paramètres de votre navigateur.
            </dd>
        </dl>

        <dl>
            <dt>7. Modifications de cette politique</dt>
            <dd>
                Nous pouvons modifier cette politique à tout moment. Les mises à jour seront publiées sur cette page avec une date révisée. Nous vous encourageons à consulter cette page régulièrement.
            </dd>
        </dl>
    
        <p>Wiggle s’engage à protéger vos données et à respecter votre confidentialité. Merci de votre confiance !</p>
    </div> 
    </section>

        <div class="container mentions">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/2pattes.svg" alt="deux pattes qui se touchent" width="50%"/>
        <div class="container p-3">
            <address class="adresse">
            Nom de la société : Build a Site
            <br>Forme Juridique : a.s.b.l.
            <br>Adresse postale du siège sociale : Chaussée de Wavre, 102 - 1160 Auderghem
            <br>E-mail : <a href="mailto:info@buildasite.be">info@buildasite.be</a>
            <br>Numéro BCE : 0799.831.118
            </address>
        </div>
    </div>
    </main>

<?php get_footer(); ?>