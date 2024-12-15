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
        <div class="form-container bg-color-form">
            <div class="title-form-container">
                <h2>Inscription</h2>
            </div>
            <form action="index.php?module=inscription&action=inscription" method="POST">
                <input type="text" name="last_name" placeholder="Nom" required>
                <input type="text" name="first_name" placeholder="Prénom" required>
                <input type="email" name="email" placeholder="Adresse e-mail" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <input type="password" name="confirm_password" placeholder="Confirmer votre mot de passe" required>
                <button type="submit" name="submit" value="1">Sauvegarder</button>
                <p class="login-link">
                    Déjà un compte ? <a href="index.php?module=connexion&action=formulaireConnexion">Connectez-vous</a>
                </p>
            </form>
        </div>
<?php
    }
}
