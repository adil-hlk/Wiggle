<?php 
/* Template Name: Aide */
get_header(); 
?>

<main>
<section class="container p-5">
  <h1 class="text-uppercase fw-bold text-start">QUESTIONS FRÉQUENTES</h1>
<div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <h3>Trouver un pet-sitter</h3>
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
        <div class="accordion-body text-start">
            <p>Comment trouver un pet-sitter près de chez moi ?
            <br>Utilisez le filtre par ville ou code postal pour voir les pet-sitters disponibles dans votre région.</p>
            <p>Les pet-sitters sont-ils vérifiés ?
            <br>Oui, chaque pet-sitter est soumis à une vérification et évalué par notre communauté.</p>
            <p>Puis-je voir les avis des autres propriétaires ?
            <br>Oui, chaque profil affiche les évaluations laissées par les propriétaires précédents.</p>
            <p>Puis-je filtrer par type d’animaux acceptés ?
            <br>Oui, utilisez les options de recherche avancée pour choisir en fonction de vos besoins.</p>
            <p>Quels services les pet-sitters peuvent-ils offrir ?
            <br>Les services varient : promenades, visites à domicile, garde à domicile ou hébergement chez le pet-sitter.</p>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            <h3>Avant et pendant la garde des animaux</h3>
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body text-start">
            <p>Que faire avant de confier mon animal ?
            <br>Discutez avec le pet-sitter pour expliquer les besoins spécifiques de votre animal (alimentation, habitudes, etc.).</p>
            <p>Mon animal a des besoins particuliers, que faire ?
            <br>Indiquez ces détails dans votre demande et confirmez avec le pet-sitter qu’il est à l’aise avec ces exigences.</p>
            <p>Puis-je rencontrer le pet-sitter avant la garde ?
            <br>Oui, une rencontre préalable est encouragée pour établir une relation de confiance.</p>
            <p>Comment rester en contact avec le pet-sitter pendant la garde ?
            <br>Vous pouvez utiliser le chat intégré pour recevoir des nouvelles et des photos de votre animal.</p>
            <p>Que se passe-t-il si l’animal tombe malade pendant la garde ?
            <br>Le pet-sitter est formé pour réagir rapidement et vous contacter immédiatement en cas de problème.</p>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            <h3>Demandes et réservations</h3>
        </button>
      </h2>
      <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body text-start">
            <p>Comment réserver un pet-sitter ?
            <br>Envoyez une demande via le profil du pet-sitter et attendez sa confirmation.</p>
            <p>Combien de temps faut-il pour qu’un pet-sitter réponde ?
            <br>La plupart répondent dans les 24 heures.</p>
            <p>Puis-je annuler une réservation ?
            <br>Oui, selon les conditions d’annulation indiquées sur le profil du pet-sitter.</p>
            <p>Que faire si le pet-sitter annule ma réservation ?
            <br>Vous serez immédiatement informé et aidé à trouver un autre pet-sitter.</p>
        </div>
      </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            <h3>Assurance, urgences et sécurité</h3>
          </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body text-start">
            <p>Mon animal est-il couvert en cas d’accident ?
            <br>Oui, notre service inclut une assurance pour les incidents pendant la garde.</p>
            <p>Que faire en cas d’urgence médicale pour mon animal ?
            <br>Le pet-sitter vous contactera et se rendra chez le vétérinaire si nécessaire.</p>
            <p>Les informations que je partage sont-elles sécurisées ?
            <br>Oui, nous respectons les normes RGPD pour protéger vos données personnelles.</p>
            <p>Et si je ne suis pas satisfait du service ?
            <br>Contactez notre support client pour discuter des solutions possibles.</p>
            <p>Comment garantir la sécurité de mon animal ?
            <br>En choisissant un pet-sitter avec de bonnes évaluations et en expliquant clairement vos attentes.</p>
          </div>
        </div>
      </div>
</section>
      <img class="illu-img-moyen" src="<?php echo get_template_directory_uri(); ?>/assets/images/chat-interogation.svg" alt="chat se posant une question"/>
      <section class="p-5 bg-custom">
        <h2 class="text-uppercase fw-bold text-start">FORMULAIRE DE CONTACT</h2>
        <div class="row">
          <form class="text-start p-2">
              <div class="form-group">
                  <label for="formulaire-à-choix1" class="fw-bold">Quelle est votre question ?</label>
                  <select class="form-control" id="formulaire-à-choix1">
                    <option>Réservation</option>
                    <option>Mon compte</option>
                    <option>Signaler un problème</option>
                    <option>Autre</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="formulaire-à-choix3" class="fw-bold">Message</label>
                  <textarea class="form-control" id="formulaire-à-choix3"></textarea>
                </div>
              <div class="form-group">
                <label for="formulaire-à-choix3" class="fw-bold">Adresse mail</label>
                <textarea class="form-control" id="formulaire-à-choix3"></textarea>
              </div>
      </div>
      <br><a href="#" class="btn-rechercher md-2" role="button" aria-disabled="true">Envoyer</a>
      </section>
  </div>
</main>

<?php get_footer(); ?>