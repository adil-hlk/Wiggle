<?php 
$currentuser = wp_get_current_user() ;
$profile_picture = get_user_meta($current_user->ID,'profile_picture', true);
/* Template Name: Mon Profil */
get_header(); 
?>

<section id="profil" class="propos">
    <div class="row align-item-center">
        <div class="col-md-6">
            <div class="container">
                <div class ="text-uppercase fw-bold pt-3"><?php echo $currentuser -> first_name; ?> <?php echo $currentuser -> last_name; ?></div>
                
                <?php if ($profile_picture) {
                   echo '<img src="' . esc_url($profile_picture) . '" alt="Photo de profil de ' . esc_attr($current_user->display_name) . '" class="photo-profil">';
                    }
                ?>
            </div>
            <div>
                <a href="<?php echo home_url('modifier'); ?>">modifier mon profil</a>
            </div>
        </div>
        <div class="col-md-6 align-item-right pt-3">
            <div class="container">
                <div>
                    <h3 class="text-uppercase fw-bold text-start">À propos de <?php echo $currentuser -> first_name;?> <?php echo $currentuser -> last_name; ?></h3>
                    <p class="text-start"><?php echo $currentuser -> description; ?></p>
                </div>
                <div class="align-items-center pt-3">
                    <h4 class="text-uppercase fw-bold text-start"><?php
// Vérifie si l'utilisateur est connecté
if (is_user_logged_in()) {
    // Récupère les informations de l'utilisateur connecté
    $current_user = wp_get_current_user();

    // Récupère les rôles de l'utilisateur (un utilisateur peut avoir plusieurs rôles)
    $roles = $current_user->roles;

    // Vérifie le rôle et affiche un message en fonction
    if (in_array('chercheur', $roles)) {
        echo "est à la recherche d'un sitter.";
    } elseif (in_array('sitter', $roles)) {
        echo "propose ses services en tant que sitter.";  } } ?>
                    </h4>
                </div>
                <div>
                <form id="notification-form">
                  <button class="btn btn-primary"type="submit">Devenir Sitter</button>
                </form>
                </div>
            </div>
        </div>
</section>

<section id="services" class="services p-5">
    <div class="container">
        <h2 class="text-uppercase fw-bold col-9 col-md-11 order-1 order-md-1 text-start"><?php echo $currentuser -> first_name;?> <?php echo $currentuser -> last_name; ?> propose</h2>
    </div>
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
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/2pattes.svg" alt="deux pattes qui se touchent" width="50%"/>
</div>

<section id="Avis" class="text-center p-5 bg-custom1">
    <div class="container">
    <h2 class="text-uppercase fw-bold text-start">AVIS</h2>
    </div>
    <div class="carousel-container">
        <div class="container1">
          <div class="glass" data-text="Avis de Paul : Excellent service !">
            <p>Paul : "Mon chien a été traité comme un roi, super expérience !"</p>
          </div>
          <div class="glass" data-text="Avis de Marie : Très satisfait !">
            <p>Marie : "Le pet-sitter était attentionné et très professionnel."</p>
          </div>
          <div class="glass" data-text="Avis de Ahmed : Parfait !">
            <p>Ahmed : "Je recommande, mon chat s'est senti à l'aise dès le départ."</p>
          </div>
        </div>
      </div> 
</section>

<section class="container pt-2">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d80598.65185362665!2d4.293016035002747!3d50.855093690325525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3a4ed73c76867%3A0xc18b3a66787302a7!2sBrussels!5e0!3m2!1sen!2sbe!4v1734356104826!5m2!1sen!2sbe" width="90%" height="80%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>

<section  class="container pt-2">
    <h2 class="text-uppercase fw-bold text-start pt-2">disponibilité</h2>



</section>

<section>
  <h2 class="text-uppercase fw-bold text-start pt-2">RECHERCHER</h2>

  <!-- Champ de recherche par texte -->
  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for a region..." title="Type in a region name">

  <!-- Sélection multiple pour les services -->
  <select id="serviceFilter" multiple onchange="myFunction()" title="Select services">
    <option value="Promenade">Promenade</option>
    <option value="Hébergement">Hébergement</option>
    <option value="Garderie">Garderie</option>
    <option value="Garderie de nuit">Gardenerie de nuit</option>
  </select>

  <table id="myTable">
    <tr class="header">
      <th style="width:30%;">Nom</th>
      <th style="width:30%;">Région</th>
      <th style="width:40%;">Service</th>
    </tr>
    <tr>
      <td>Alfreds Futterkiste</td>
      <td>Liège</td>
      <td>Garderie</td>
    </tr>
    <tr>
      <td>Berglunds snabbkop</td>
      <td>Mons</td>
      <td>Promenade</td>
    </tr>
    <tr>
      <td>Island Trading</td>
      <td>Wavre</td>
      <td>Hébergement</td>
    </tr>
    <tr>
      <td>Koniglich Essen</td>
      <td>Namur</td>
      <td>Garderie de nuit</td>
    </tr>
  </table>
</section>
 <script>
function myFunction() {
  var input, filter, serviceFilter, selectedServices, table, tr, td, i, txtValue, matchFound;
  
  // Recherche par texte
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();

  // Sélection des services
  serviceFilter = document.getElementById("serviceFilter");
  selectedServices = Array.from(serviceFilter.selectedOptions).map(option => option.value.toUpperCase());

  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Parcourir toutes les lignes (tr), sauf la première (en-tête)
  for (i = 1; i < tr.length; i++) {
    tr[i].style.display = "none"; // Masquer toutes les lignes par défaut
    td = tr[i].getElementsByTagName("td");
    matchFound = false;

    // Vérifier la recherche par texte
    if (td) {
      // Vérifier le nom ou le pays
      txtValue = (td[0].textContent || td[0].innerText) + " " + (td[1].textContent || td[1].innerText);
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        matchFound = true;
      }

      // Vérifier si le service correspond aux choix multiples
      var serviceValue = (td[2].textContent || td[2].innerText).toUpperCase();
      if (selectedServices.length > 0 && !selectedServices.includes(serviceValue)) {
        matchFound = false; // Masquer si le service ne correspond pas
      }
    }

    // Afficher la ligne si une correspondance est trouvée
    if (matchFound) {
      tr[i].style.display = "";
    }
  }
}
</script>

<?php get_footer(); ?>