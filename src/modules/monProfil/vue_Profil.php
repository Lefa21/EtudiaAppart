<?php
require_once __DIR__  . '/../../vue_generique.php';
class VueProfil extends VueGenerique
{
  public function __construct()
  {
    parent::__construct();
  }

  public function profil($userData)
  {
    $isStudent = isset($_SESSION["user_status"]) && $_SESSION["user_status"] === "etudiant";
?>

    <link rel="stylesheet" href="./src/css/my_profil.css">
    <script type="text/javascript" src="./src/scripts/mon_profil.js"></script>
    <main class="student-profile" role="main">
      <?php
      include "./src/menu_my_account.php";
      ?>
      <section class="main-content-profile">
        <div class="profile-content-profile">
          <div class="section-header-profile">
            <h1 class="section-title-profile">Profil</h1>
            <p class="section-subtitle-profile">Modifier vos informations personnelles et académiques</p>
          </div>

          <form id="profilForm" action="index.php?module=monProfil&action=Profil" method="POST">
            <div class="form-section-profile">
              <h2 class="form-title-profile">Informations personnelles</h2>

              <div class="form-row-profile">
                <div class="form-group-profile">
                  <label for="last_name" class="form-label-profile">Nom</label>
                  <input type="text" id="last_name" name="last_name" class="form-input-profile" value="<?= htmlspecialchars($userData['last_name']) ?>" placeholder="Votre nom" />
                </div>
                <div class="form-group-profile">
                  <label for="first_name" class="form-label-profile">Prénom</label>
                  <input type="text" id="first_name" name="first_name" class="form-input-profile" value="<?= htmlspecialchars($userData['first_name']) ?>" placeholder="Votre prénom" />
                </div>
              </div>

              <div class="form-row-profile">
                <div class="form-group-profile">
                  <label for="email" class="form-label-profile">Email</label>
                  <input type="email" id="email" name="email" class="form-input-profile" value="<?= htmlspecialchars($userData['email']) ?>" placeholder="Votre adresse email" />
                </div>
                <div class="form-group-profile">
                  <label for="mobile_number" class="form-label-profile">Numéro de téléphone</label>
                  <input type="tel" id="mobile_number" name="mobile_number" class="form-input-profile" value="<?= htmlspecialchars($userData['mobile_number']) ?>" placeholder="Votre numéro de téléphone" />
                </div>
              </div>

              <div class="form-row-profile">
                <div class="form-group-profile">
                  <label for="gender" class="form-label-profile">Sexe</label>
                  <select id="gender" class="form-input-profile" name="gender">
                    <option value="">Votre sexe</option>
                    <option value="1">Masculin</option>
                    <option value="2">Féminin</option>
                    <option value="3">Autre</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="form-section-profile">
              <h2 class="form-title-profile">Lieu de résidence actuel</h2>

              <div class="form-row-profile">
                <div class="form-group-profile">
                  <label for="address_line" class="form-label-profile">Adresse</label>
                  <input type="text" id="address_line" name="address_line" class="form-input-profile" value="<?= htmlspecialchars($userData['address_line']) ?>" placeholder="Votre adresse" />
                  <input type="hidden" name="id_address" value="<?= htmlspecialchars($userData['id_address']) ?>">
                </div>
                <div class="form-group-profile">
                  <label for="zipcode" class="form-label-profile">Code postal</label>
                  <input type="text" id="zipcode" name="zipcode" class="form-input-profile" value="<?= htmlspecialchars($userData['zipcode']) ?>" placeholder="Votre code postal" />
                </div>
              </div>

              <div class="form-row-profile">
                <div class="form-group-profile">
                  <label for="city" class="form-label-profile">Ville</label>
                  <input type="text" id="city" name="city" class="form-input-profile" value="<?= htmlspecialchars($userData['city']) ?>" placeholder="Votre ville" />
                </div>
                <div class="form-group-profile">
                  <label for="country" class="form-label-profile">Pays</label>
                  <input type="text" id="country" name="country" class="form-input-profile" value="<?= htmlspecialchars($userData['country']) ?>" placeholder="Votre pays" />
                </div>
              </div>
            </div>

            <?php if ($isStudent): ?>
            <div class="form-section-profile">
              <h2 class="form-title-profile">Informations scolaires</h2>

              <div class="form-row-profile">
                <div class="form-group-profile">
                  <label for="school_name" class="form-label-profile">Nom de l'école</label>
                  <input type="text" id="school_name" name="school_name" class="form-input-profile" value="<?= htmlspecialchars($userData['school_name']) ?>" placeholder="Nom de votre établissement scolaire" />
                </div>
              </div>

              <div class="form-row-profile">
                <div class="form-group-profile">
                  <label for="student_email" class="form-label-profile">Email étudiant</label>
                  <input type="email" id="student_email" name="student_email" class="form-input-profile" value="<?= htmlspecialchars($userData['student_email']) ?>" placeholder="Votre email étudiant" />
                </div>
              </div>
            </div>
            <?php endif; ?>

            <div class="form-section-profile">
              <h2 class="form-title-profile">Sécurité</h2>

              <div class="form-row-profile">
                <div class="form-group-profile">
                  <label for="current-password" class="form-label-profile">Mot de passe actuel</label>
                  <div class="password-input-wrapper-profile">
                    <input type="password" id="current-password" name="current-password" class="form-input-profile" placeholder="Votre mot de passe actuel" />
                    <button type="button" class="password-toggle-profile" aria-label="Afficher le mot de passe">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M12 4C7 4 2.73 7.11 1 12C2.73 16.89 7 20 12 20C17 20 21.27 16.89 23 12C21.27 7.11 17 4 12 4ZM12 17C9.24 17 7 14.76 7 12C7 9.24 9.24 7 12 7C14.76 7 17 9.24 17 12C17 14.76 14.76 17 12 17ZM12 9C10.34 9 9 10.34 9 12C9 13.66 10.34 15 12 15C13.66 15 15 13.66 15 12C15 10.34 13.66 9 12 9Z" fill="currentColor" />
                      </svg>
                    </button>
                  </div>
                </div>
              </div>

              <div class="form-row-profile">
                <div class="form-group-profile">
                  <label for="new-password" class="form-label-profile">Nouveau mot de passe</label>
                  <div class="password-input-wrapper-profile">
                    <input type="password" id="new-password" name="new-password" class="form-input-profile" placeholder="Votre nouveau mot de passe" />
                    <button type="button" class="password-toggle-profile" aria-label="Afficher le mot de passe">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M12 4C7 4 2.73 7.11 1 12C2.73 16.89 7 20 12 20C17 20 21.27 16.89 23 12C21.27 7.11 17 4 12 4ZM12 17C9.24 17 7 14.76 7 12C7 9.24 9.24 7 12 7C14.76 7 17 9.24 17 12C17 14.76 14.76 17 12 17ZM12 9C10.34 9 9 10.34 9 12C9 13.66 10.34 15 12 15C13.66 15 15 13.66 15 12C15 10.34 13.66 9 12 9Z" fill="currentColor" />
                      </svg>
                    </button>
                  </div>
                </div>
                <div class="form-group-profile">
                  <label for="confirm-password" class="form-label-profile">Confirmer le nouveau mot de passe</label>
                  <div class="password-input-wrapper-profile">
                    <input type="password" id="confirm-password" name="confirm-password" class="form-input-profile" placeholder="Confirmer votre nouveau mot de passe" />
                    <button type="button" class="password-toggle-profile" aria-label="Afficher le mot de passe">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M12 4C7 4 2.73 7.11 1 12C2.73 16.89 7 20 12 20C17 20 21.27 16.89 23 12C21.27 7.11 17 4 12 4ZM12 17C9.24 17 7 14.76 7 12C7 9.24 9.24 7 12 7C14.76 7 17 9.24 17 12C17 14.76 14.76 17 12 17ZM12 9C10.34 9 9 10.34 9 12C9 13.66 10.34 15 12 15C13.66 15 15 13.66 15 12C15 10.34 13.66 9 12 9Z" fill="currentColor" />
                      </svg>
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <button type="submit" name="update_profil" id="saveProfileBtn" class="save-button-profile">Sauvegarder</button>
          </form>
        </div>
      </section>
    </main>
<?php
  }
}
?>