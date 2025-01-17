<?php

require_once __DIR__ . '/../../vue_generique.php';

class VueContact extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function formulaireContact()
    {
        ?>

        <link rel="stylesheet" href="./src/css/contact.css">

        <main class="owner-depot_annonce" role="main">
            <div class="main-content-depot_annonce">
                <div class="form-step" >
                    <form id="form_infos" action="index.php?module=contact&action=contact" method="POST">
              <span id="text_titre_form" class="container-title_creation-annonce">
                <a id="titre_form">Contactez-nous</a>
              </span>
                            <div class="champs_titre" id="titre_nom">
                                Nom
                                <span><input class="champs" id="nom" name="nom_form" placeholder="Nom" aria-label="Nom" required>*</span>
                            </div>
                            <div class="champs_titre" id="titre_prenom">
                                Prénom
                                <span><input class="champs" id="prenom" name="prenom_form" placeholder="Prénom" aria-label="Prénom" required>*</span>
                            </div>
                            <div class="champs_titre" id="titre_message">
                                Message
                                <span><textarea class="champs" id="message" name="message_form" placeholder="Message" aria-label="Message" required></textarea>*</span>
                            </div>
                            <div class="nav_save">
                                <button type="submit" name="submit_button" class="button">
                                    Envoyer
                                </button>
                            </div>
                    </form>
                        </div>
                </div>
        </main>
        <?php
    }
}
