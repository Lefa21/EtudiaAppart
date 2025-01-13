<link rel="stylesheet" href="./src/css/menu_my_account.css">
<aside class="sidebar">
      <div class="user-info">
        <div class="profile-image-container">
          <img src="assets/photo_profil.png" alt="Profile photo" class="user-avatar">
          <label for="profile-image" class="image-upload-label" aria-label="Change profile picture">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 8.66667V12.6667C12 13.0203 11.8595 13.3594 11.6095 13.6095C11.3594 13.8595 11.0203 14 10.6667 14H3.33333C2.97971 14 2.64057 13.8595 2.39052 13.6095C2.14048 13.3594 2 13.0203 2 12.6667V5.33333C2 4.97971 2.14048 4.64057 2.39052 4.39052C2.64057 4.14048 2.97971 4 3.33333 4H7.33333" stroke="white" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M10 2H14V6" stroke="white" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M6.66666 9.33333L14 2" stroke="white" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </label>
          <input type="file" id="profile-image" class="image-upload-input" accept="image/*" aria-label="Upload new profile picture">
        </div>
        <div class="user-details">
          <span class="user-name">Ben youssef Faël</span>
          <span class="user-role">Profil étudiant</span>
        </div>
      </div>
      <nav class="nav-menu" aria-label="Main navigation">
      <a href="index.php?module=monProfil&action=Profil" 
        class="nav-item <?= ($_GET["module"] == "monProfil" && $_GET["action"] == "Profil") ? 'active' : '' ?>">
          <img src="assets/icon_profil.svg" alt="" class="nav-item-icon">
          <span>Profil</span>
        </a>
        <a href="index.php?module=records&action=monDossier" class="nav-item">
          <img src="assets/icon_documents_profile.svg" alt="" class="nav-item-icon">
          <span>Mon dossier</span>
        </a>
        <a href="index.php?module=owner_requests&action=follow-up_owner_requests"
        class="nav-item <?= ($_GET["module"] == "owner_requests" && $_GET["action"] == "follow-up_owner_requests") ? 'active' : '' ?>">
          <img src="assets/icon_follow_request.svg" alt="" class="nav-item-icon">
          <span>Suivi des demandes</span>
        </a>
        <a href="index.php?module=owner_requests&action=manage_application"
        class="nav-item <?= ($_GET["module"] == "owner_requests" && $_GET["action"] == "manage_application") ? 'active' : '' ?>">
          <img src="assets/gerer_demande.svg" alt="" class="nav-item-icon">
          <span>Gerer Mes demandes</span>
        </a>
        <a href="index.php?module=messagerie&action=messagerie"
          class="nav-item <?= ($_GET["module"] == "messagerie" && $_GET["action"] == "messagerie") ? 'active' : '' ?>">
          <img src="assets/icon_messages_profile.svg" alt="" class="nav-item-icon">
          <span>Messagerie</span>
        </a>
        <a href="#favorites" class="nav-item">
          <img src="assets/icon_wishlist.svg" alt="" class="nav-item-icon">
          <span>Mes favoris</span>
        </a>
      </nav>
      <button type="button" class="settings-button">Paramètres</button>
    </aside>

    