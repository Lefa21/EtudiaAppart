<?php

require_once __DIR__  . '/../../vue_generique.php';

class VueConnexion extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    
    public function formulaireConnexion(){
        ?>
            <div class="form-container bg-color-form">
            <div class="title-form-container">
              <h2>Connexion</h2>
            </div>
                <form action="index.php?module=connexion&action=connexion" method="POST">
                    <input type="email" name="email" placeholder="Adresse e-mail" required>
                    <input type="password" name="password" placeholder="Mot de passe" required>
                    <button type="submit" name="submit" value="1">Sauvegarder</button>
                    <p class="login-link">
                     Pas de compte ? <a href="index.php?module=inscription&action=formulaireInscription">Inscrivez-vous</a>
                    </p>
                </form>
            </div>
        <?php
    }
}
?>