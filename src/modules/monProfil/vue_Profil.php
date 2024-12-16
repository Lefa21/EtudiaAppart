<?php

class VueProfil extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Profil()
    {
?>

<html lang="fr">
<body>
<div class="container-profil">
<aside class="sidebar" role="complementary" aria-label="Navigation latérale">
                <div class="profile-header">
                    <img src="assets/photo_profil.png" alt="Photo de profil de Ben youssef Faël" class="profile-icon" width="49" height="49" />
                    <div class="profile-info">
                        <span class="profile-name">Ben youssef Faël</span>
                        <span class="profile-type">Profil propriétaire</span>
                    </div>
                </div>

                <nav class="nav-menu" role="navigation" aria-label="Menu principal">
                    <a href="#profile" class="nav-item">
                        <img src="assets/icon_profil.svg" alt="" class="nav-icon" width="30" height="30" aria-hidden="true" />
                        <span>Profil</span>
                    </a>
                    <a href="#dossier" class="nav-item">
                        <img src="assets/icon_documents_profile.svg" alt="" class="nav-icon" width="30" height="30" aria-hidden="true" />
                        <span>Mon dossier</span>
                    </a>
                    <a href="#requests" class="nav-item active" aria-current="page">
                        <img src="assets/icon_follow_request.svg" alt="" class="nav-icon" width="30" height="30" aria-hidden="true" />
                        <span>Suivi des demandes</span>
                    </a>
                    <a href="#messages" class="nav-item">
                        <img src="assets/icon_messages_profile.svg" alt="" class="nav-icon" width="30" height="30" aria-hidden="true" />
                        <span>Messagerie</span>
                    </a>
                    <a href="#favorites" class="nav-item">
                        <img src="assets/icon_wishlist.svg" alt="" class="nav-icon" width="30" height="30" aria-hidden="true" />
                        <span>Mes favoris</span>
                    </a>
                </nav>

                <button class="action-button primary" aria-label="Accéder aux paramètres">Paramètres</button>
            </aside>

        <main class="content-profil">
            <h2 class="title-profil">Profil</h2>
            <form id="profileForm">
                <section>
                    <h3 class="title-profil">Informations personnelles</h3>
                    <div class="form-row-profil">
                        <div class="form-group-profil">
                            <label class="label-profil" for="nom">Nom</label>
                            <input class="input-profil" type="text" id="nom" placeholder="Votre nom">
                        </div>
                        <div class="form-group-profil">
                            <label class="label-profil" for="prenom">Prénom</label>
                            <input class="input-profil" type="text" id="prenom" placeholder="Votre prénom">
                        </div>
                    </div>
                    <div class="form-row-profil">
                        <div class="form-group-profil">
                            <label class="label-profil" for="email">Email</label>
                            <input class="input-profil" type="email" id="email" placeholder="Votre adresse email">
                        </div>
                        <div class="form-group-profil">
                            <label class="label-profil" for="telephone">Numéro de téléphone</label>
                            <input class="input-profil" type="text" id="telephone" placeholder="Votre numéro">
                        </div>
                    </div>
                    <div class="form-row-profil">
                        <div class="form-group-profil">
                            <label class="label-profil" for="sexe">Sexe</label>
                            <input class="input-profil" type="text" id="sexe" placeholder="Votre sexe">
                        </div>
                    </div>
                </section>
                <section>
                  <h3 class="title-profil">Lieu de résidence actuel</h3>
                    <div class="form-row-profil">
                        <div class="form-group-profil">
                            <label class="label-profil" for="adresse">Adresse</label>
                            <input class="input-profil" type="text" id="adresse" placeholder="Votre adresse">
                        </div>
                        <div class="form-group-profil">
                            <label class="label-profil" for="code-postal">Code postal</label>
                            <input class="input-profil" type="text" id="code-postal" placeholder="Votre code postal">
                        </div>
                    </div>
                </section>
                <section>
                    <h3 class="title-profil">Informations scolaires</h3>
                    <div class="form-row-profil">
                        <div class="form-group-profil">
                            <label class="label-profil" for="ecole">Nom de l'école</label>
                            <input class="input-profil" type="text" id="ecole" placeholder="Nom de votre école">
                        </div>
                        <div class="form-group-profil">
                            <label class="label-profil" for="email-etudiant">Email étudiant</label>
                            <input class="input-profil" type="email" id="email-etudiant" placeholder="Votre email étudiant">
                        </div>
                    </div>
                    <div class="button-container">
                        <button class="button-ajouter-ecole button-profil" type="button">Votre école n'est pas reconnue ?<br> > Ajoutez la ici <</button>
                    </div>
                </section>
                <button class="save-button button-profil" type="button" onclick="saveProfile()">Sauvegarder</button>
            </form>
        </main>
    </div>
    <script>
        function saveProfile() {
            alert('Profil sauvegardé avec succès!');
        }

        function closeSidebar() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.style.display = 'none';
        }
    </script>
</body>
</html>

        <?php
    }
}