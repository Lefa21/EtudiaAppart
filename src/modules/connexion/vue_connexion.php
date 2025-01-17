<?php

require_once __DIR__  . '/../../vue_generique.php';

class VueConnexion extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }


    public function formulaireConnexion()
    {
?>
        <link rel="stylesheet" href="./src/css/connexion.css">
        <div class="login-container">
            <main class="main-content-login">
                <div class="login-wrapper">
                    <form class="login-form-main" action="index.php?module=connexion&action=connexion" method="POST">
                        <h1 class="form-title-login">Connexion</h1>

                        <div class="input-group-login">
                            <img
                                src="assets/icon_mail_connexion.png"
                                class="field-icon"
                                alt=""
                                aria-hidden="true" />
                            <label for="email" class="visually-hidden">Adresse e-mail</label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-input-login"
                                placeholder="Adresse e-mail"
                                required
                                aria-required="true" />
                        </div>

                        <div class="input-group-login">
                            <img
                                src="assets/icon_password_connexion.png"
                                class="field-icon"
                                alt=""
                                aria-hidden="true" />
                            <label for="password" class="visually-hidden">Mot de passe</label>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="form-input-login"
                                placeholder="Mot de passe"
                                required
                                aria-required="true" />
                        </div>

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