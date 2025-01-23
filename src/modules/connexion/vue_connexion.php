<?php

require_once __DIR__  . '/../../vue_generique.php';

class VueConnexion extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function formulaireConnexion($errors = [])
    {
?>
        <link rel="stylesheet" href="./src/css/connexion.css">
        <link rel="stylesheet" href="./src/css/connexion.css">
        <script type="text/javascript" src="./src/scripts/passwordVisibility.js">
        </script>
        <div class="login-container">
            <main class="main-content-login">
                <div class="login-wrapper">
                    <form class="login-form-main" action="index.php?module=connexion&action=connexion" method="POST">
                        <h1 class="form-title-login">Connexion</h1>

                        <div class="input-group-login">
                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-input-login"
                                placeholder="Adresse e-mail"
                                aria-invalid="<?= isset($errors['email']) ? 'true' : 'false' ?>"
                                value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" />
                        </div>
                        <span class="required">*</span>
                        <?php if (isset($errors['email'])): ?>
                            <span class="error-message"><?= htmlspecialchars($errors['email']) ?></span>
                        <?php endif; ?>

                        <div class="input-group-login">
                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="form-input-login"
                                placeholder="Mot de passe"
                                aria-invalid="<?= isset($errors['password']) ? 'true' : 'false' ?>"
                                value="<?= htmlspecialchars($_POST['password'] ?? '') ?>" />
                            
                            <span class="toggle-password" onclick="togglePasswordVisibility()">
                                <img src="assets/hide.png" alt="Afficher le mot de passe" id="toggleIcon" />
                            </span>
                        </div>
                        <span class="required">*</span>
                        <?php if (isset($errors['password'])): ?>
                            <span class="error-message"><?= htmlspecialchars($errors['password']) ?></span>
                        <?php endif; ?>


                        <a href="index.php?module=resetPassword&action=formulaireResetPassword" class="reset-pwd">Mot de passe oublié</a>

                        <button type="submit" name="submit" class="submit-btn-login">
                            Connexion
                        </button>

                        <p class="register-link-wrapper">
                            Pas de compte ?
                            <a href="index.php?module=inscription&action=formulaireInscription" class="register-link">
                                Inscrivez-vous
                            </a>
                        </p>
                    </form>
                </div>
            </main>
        </div>
<?php
    }
}
?>