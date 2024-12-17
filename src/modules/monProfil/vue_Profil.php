<?php

class VueProfil extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function profil()
    {
?>
<link rel="stylesheet" href="./src/css/my_profil.css">
<script type="text/javascript" src="./src/scripts/mon_profil.js"></script>
<main class="student-profile" role="main">
  <div class="main-content-profile">
  <?php
            include "./src/menu_my_account.php";
        ?>
    <section class="profile-content-profile">
      <div class="section-header-profile">
        <h1 class="section-title-profile">Profil</h1>
        <p class="section-subtitle-profile">Modifier vos informations personnelles et académiques</p>
      </div>

      <form>
        <div class="form-section-profile">
          <h2 class="form-title-profile">Informations personnelles</h2>
          
          <div class="form-row-profile">
            <div class="form-group-profile">
              <label for="lastname" class="form-label-profile">Nom</label>
              <input type="text" id="lastname" class="form-input-profile" placeholder="Votre nom" />
            </div>
            <div class="form-group-profile">
              <label for="firstname" class="form-label-profile">Prénom</label>
              <input type="text" id="firstname" class="form-input-profile" placeholder="Votre prénom" />
            </div>
          </div>

          <div class="form-row-profile">
            <div class="form-group-profile">
              <label for="email" class="form-label-profile">Email</label>
              <input type="email" id="email" class="form-input-profile" placeholder="Votre adresse email" />
            </div>
            <div class="form-group-profile">
              <label for="phone" class="form-label-profile">Numéro de téléphone</label>
              <input type="tel" id="phone" class="form-input-profile" placeholder="Votre numéro de téléphone" />
            </div>
          </div>

          <div class="form-row-profile">
            <div class="form-group-profile">
              <label for="gender" class="form-label-profile">Sexe</label>
              <select id="gender" class="form-input-profile">
                <option value="">Votre sexe</option>
                <option value="M">Masculin</option>
                <option value="F">Féminin</option>
                <option value="O">Autre</option>
              </select>
            </div>
          </div>
        </div>

        <div class="form-section-profile">
          <h2 class="form-title-profile">Sécurité</h2>
          
          <div class="form-row-profile">
            <div class="form-group-profile">
              <label for="current-password" class="form-label-profile">Mot de passe actuel</label>
              <div class="password-input-wrapper-profile">
                <input type="password" id="current-password" class="form-input-profile" placeholder="Votre mot de passe actuel" />
                <button type="button" class="password-toggle-profile" aria-label="Afficher le mot de passe">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M12 4C7 4 2.73 7.11 1 12C2.73 16.89 7 20 12 20C17 20 21.27 16.89 23 12C21.27 7.11 17 4 12 4ZM12 17C9.24 17 7 14.76 7 12C7 9.24 9.24 7 12 7C14.76 7 17 9.24 17 12C17 14.76 14.76 17 12 17ZM12 9C10.34 9 9 10.34 9 12C9 13.66 10.34 15 12 15C13.66 15 15 13.66 15 12C15 10.34 13.66 9 12 9Z" fill="currentColor"/>
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="form-row-profile">
            <div class="form-group-profile">
              <label for="new-password" class="form-label-profile">Nouveau mot de passe</label>
              <div class="password-input-wrapper-profile">
                <input type="password" id="new-password" class="form-input-profile" placeholder="Votre nouveau mot de passe" />
                <button type="button" class="password-toggle-profile" aria-label="Afficher le mot de passe">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M12 4C7 4 2.73 7.11 1 12C2.73 16.89 7 20 12 20C17 20 21.27 16.89 23 12C21.27 7.11 17 4 12 4ZM12 17C9.24 17 7 14.76 7 12C7 9.24 9.24 7 12 7C14.76 7 17 9.24 17 12C17 14.76 14.76 17 12 17ZM12 9C10.34 9 9 10.34 9 12C9 13.66 10.34 15 12 15C13.66 15 15 13.66 15 12C15 10.34 13.66 9 12 9Z" fill="currentColor"/>
                  </svg>
                </button>
              </div>
            </div>
            <div class="form-group-profile">
              <label for="confirm-password" class="form-label-profile">Confirmer le nouveau mot de passe</label>
              <div class="password-input-wrapper-profile">
                <input type="password" id="confirm-password" class="form-input-profile" placeholder="Confirmer votre nouveau mot de passe" />
                <button type="button" class="password-toggle-profile" aria-label="Afficher le mot de passe">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M12 4C7 4 2.73 7.11 1 12C2.73 16.89 7 20 12 20C17 20 21.27 16.89 23 12C21.27 7.11 17 4 12 4ZM12 17C9.24 17 7 14.76 7 12C7 9.24 9.24 7 12 7C14.76 7 17 9.24 17 12C17 14.76 14.76 17 12 17ZM12 9C10.34 9 9 10.34 9 12C9 13.66 10.34 15 12 15C13.66 15 15 13.66 15 12C15 10.34 13.66 9 12 9Z" fill="currentColor"/>
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>

        <div class="form-section-profile">
          <h2 class="form-title-profile">Lieu de résidence actuel</h2>
          
          <div class="form-row-profile">
            <div class="form-group-profile">
              <label for="address" class="form-label-profile">Adresse</label>
              <input type="text" id="address" class="form-input-profile" placeholder="Votre adresse" />
            </div>
            <div class="form-group-profile">
              <label for="postal" class="form-label-profile">Code postal</label>
              <input type="text" id="postal" class="form-input-profile" placeholder="Votre code postal" />
            </div>
          </div>

          <div class="form-row-profile">
            <div class="form-group-profile">
              <label for="city" class="form-label-profile">Ville</label>
              <input type="text" id="city" class="form-input-profile" placeholder="Votre ville" />
            </div>
            <div class="form-group-profile">
              <label for="country" class="form-label-profile">Pays</label>
              <input type="text" id="country" class="form-input-profile" placeholder="Votre pays" />
            </div>
          </div>
        </div>

        <div class="form-section-profile">
          <h2 class="form-title-profile">Informations scolaires</h2>
          
          <div class="form-row-profile">
            <div class="form-group-profile">
              <label for="school" class="form-label-profile">Nom de l'école</label>
              <input type="text" id="school" class="form-input-profile" placeholder="Nom de votre établissement scolaire" />
            </div>
          </div>

          <div class="form-row-profile">
            <div class="form-group-profile">
              <label for="student-email" class="form-label-profile">Email étudiant</label>
              <input type="email" id="student-email" class="form-input-profile" placeholder="Votre email étudiant" />
            </div>
            <div class="form-group-profile">
              <a href="#add-school" class="form-link-profile">Votre école n'est pas reconnue ?<br />Ajoutez la ici</a>
            </div>
          </div>
        </div>

        <button type="submit" class="save-button-profile" onclick="saveProfile()">Sauvegarder</button>
      </form>
    </section>
  </div>
</main>
      
        <?php
    }
}