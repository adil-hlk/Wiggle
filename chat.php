<?php /* Template Name: Messagerie */
 get_header(); 
?>

<div class="chat-box">
  <div class="chat-header">
    <h3>Chat</h3>
  </div>
  <div class="chat-messages">
    <!-- Les messages seront ajoutés ici dynamiquement -->
  </div>
  <form class="chat-input" id="chatForm">
    <input
      type="text"
      id="chatMessage"
      placeholder="Écrivez un message..."
      required
    />
    <button class="btn-rechercher md-2" type="submit">Envoyer</button>
  </form>
</div>

<?php get_footer(); ?>