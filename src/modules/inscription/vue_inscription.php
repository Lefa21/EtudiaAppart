<?php

require_once __DIR__  . '/../../vue_generique.php';

class VueInscription extends VueGenerique
{
  public function __construct()
  {
    parent::__construct();
  }

  public function formulaireInscription($errors)
  {
?>
    <link rel="stylesheet" href="./src/css/inscription.css?v=2">
    <div class="registration-container">
      <main class="main-content-inscription">
        <div class="registration-wrapper-inscription">
          <form class="registration-form-inscription" action="index.php?module=inscription&action=inscription" method="POST">
            <h1 class="form-title-inscription">Inscription</h1>

            <label for="lastname" class="visually-hidden">Nom</label>
            <div class="input-container">
              <input
                type="text"
                id="lastname"
                name="last_name"
                class="form-input-inscription"
                placeholder="Nom"
                required />
              <span class="required">*</span> <!-- Astérisque pour champ obligatoire -->
            </div>

            <label for="firstname" class="visually-hidden">Prénom</label>
            <div class="input-container">
              <input
                type="text"
                id="firstname"
                name="first_name"
                class="form-input-inscription"
                placeholder="Prénom"
                required />
              <span class="required">*</span>
            </div>

            <label for="email" class="visually-hidden">Adresse e-mail</label>
            <div class="input-container">
              <input
                type="email"
                id="email"
                name="email"
                class="form-input-inscription"
                placeholder="Adresse e-mail"
                required
                aria-invalid="<?= isset($errors['email']) ? 'true' : 'false' ?>"
                value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" />
              <span class="required">*</span>
            </div>

            <select name="profile_status" id="profile_status" class="role">
              <option value="">--- Sélectionner un rôle ---</option>
              <option value="etudiant">Etudiant</option>
              <option value="proprietaire">Propriétaire</option>
            </select>

            <label for="password" class="visually-hidden">Mot de passe</label>
            <div class="input-container">
              <input
                type="password"
                id="password"
                name="password"
                class="form-input-inscription"
                placeholder="Mot de passe"
                required />
              <span class="required">*</span>
            </div>

            <label for="confirm-password" class="visually-hidden">Confirmer votre mot de passe</label>
            <div class="input-container">
              <input
                type="password"
                id="confirm-password"
                name="confirm_password"
                class="form-input-inscription"
                placeholder="Confirmer votre mot de passe"
                required />
              <span class="required">*</span>
            </div>

            <button type="submit" name="submit" class="submit-btn-inscription">
              Sauvegarder
            </button>

            <p class="login-link-inscription">
              Déjà de compte ?
              <a href="index.php?module=connexion&action=formulaireConnexion" class="login-link-inscription">
                Connectez-vous
              </a>
            </p>
          </form>

        </div>
      </main>
    </div>
<?php
  }
}
