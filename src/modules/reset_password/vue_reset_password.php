<?php

require_once __DIR__  . '/../../vue_generique.php';

class VueResetPassword extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    private $action = "index.php?module=resetPassw&action=connexion";

    public function formulaireResetPassword()
    {
?>
        <link rel="stylesheet" href="./src/css/connexion.css">
        <div class="login-container">
            <div class="login-container">
                <main class="main-content-login">
                    <div class="login-wrapper">
                        <form class="login-form-main" action="index.php?module=resetPassword&action=sendPasswordReset" method="POST">
                            <h1 class="form-title-login">Réinitialiser votre mot de passe</h1>

                            <h4
                                style="
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                text-align: center;
                                margin-top: 10px;
                                margin-bottom: -20px;">
                                Veuillez entrer votre email, un lien vous sera envoyé pour créer un nouveau mot de passe
                            </h4>

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



                            <button type="submit" name="submit" class="submit-btn-login" style="margin-bottom:20px;">
                                Réinitialiser
                            </button>

                        </form>
                    </div>
                </main>
            </div>
        </div>
    <?php
    }

    public function formulaireNouveauPassword($token, $message = null)
    {
    ?>
        <link rel="stylesheet" href="./src/css/inscription.css">
        <div class="login-container">
            <main class="main-content-login">
                <div class="login-wrapper">
                    <?php if ($message): ?>
                        <div class="alert" style="color: red; margin-bottom: 20px; text-align: center;">
                            <?php echo htmlspecialchars($message); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($token): ?>
                        <form class="login-form-main" action="index.php?module=resetPassword&action=verifierEtModifierMotDePasse&token=<?php echo htmlspecialchars($token); ?>" method="POST">
                            <h1 class="form-title-login">Modifier le mot de passe</h1>

                            <label for="password" class="visually-hidden">Nouveau mot de passe</label>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="form-input-inscription"
                                placeholder="Mot de passe"
                                required
                                aria-required="true" />

                            <label for="confirm-password" class="visually-hidden">Confirmer votre mot de passe</label>
                            <input
                                type="password"
                                id="confirm-password"
                                name="confirm_password"
                                class="form-input-inscription"
                                placeholder="Confirmer votre mot de passe"
                                required
                                aria-required="true" />

                            <button type="submit" name="submit" class="submit-btn-login">
                                Valider
                            </button>
                        </form>
                    <?php endif; ?>
                </div>
            </main>
        </div>
<?php
    }
}
?>