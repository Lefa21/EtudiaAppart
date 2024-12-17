<?php

require_once __DIR__  . '/../../vue_generique.php';

class VueInscription extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function formulaireInscription()
    {
?>
<link rel="stylesheet" href="./src/css/inscription.css">
  <div class="registration-container">
    <main class="main-content-inscription">
      <div class="registration-wrapper-inscription">
        <form class="registration-form-inscription" action="index.php?module=inscription&action=inscription" method="POST">
          <h1 class="form-title-inscription">Inscription</h1>
          
          <label for="lastname" class="visually-hidden">Nom</label>
          <input 
            type="text" 
            id="lastname" 
            name="last_name"
            class="form-input-inscription" 
            placeholder="Nom" 
            required 
            aria-required="true"
          />
          
          <label for="firstname" class="visually-hidden">Prénom</label>
          <input 
            type="text" 
            id="firstname" 
            name="first_name"
            class="form-input-inscription" 
            placeholder="Prénom" 
            required
            aria-required="true"
          />
          
          <label for="email" class="visually-hidden">Adresse e-mail</label>
          <input 
            type="email" 
            id="email" 
            name="email"
            class="form-input-inscription" 
            placeholder="Adresse e-mail" 
            required
            aria-required="true"
          />
          
          <label for="password" class="visually-hidden">Mot de passe</label>
          <input 
            type="password" 
            id="password" 
            name="password"
            class="form-input-inscription" 
            placeholder="Mot de passe" 
            required
            aria-required="true"
          />
          
          <label for="confirm-password" class="visually-hidden">Confirmer votre mot de passe</label>
          <input 
            type="password" 
            id="confirm-password" 
            name="confirm_password"
            class="form-input-inscription" 
            placeholder="Confirmer votre mot de passe" 
            required
            aria-required="true"
          />
          
          <button type="submit" name="submit" class="submit-btn-inscription">
            Sauvegarder
          </button>
          
          <p class="login-link-inscription">
            Déja de compte ? 
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
