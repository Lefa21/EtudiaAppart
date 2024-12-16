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
<div class="container">
        <aside class="sidebar">
            <ul>
                <li><a href="#">Profil</a></li>
                <li><a href="#">Mon dossier</a></li>
                <li><a href="#">Suivi des demandes</a></li>
                <li><a href="#">Messagerie</a></li>
                <li><a href="#">Mes favoris</a></li>
            </ul>
            <button class="close-sidebar" onclick="closeSidebar()">Fermer le menu</button>
        </aside>
        <main class="content">
            <h2>Profil</h2>
            <form id="profileForm">
                <section>
                    <h3>Informations personnelles</h3>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" id="nom" placeholder="Votre nom">
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" id="prenom" placeholder="Votre prénom">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" placeholder="Votre adresse email">
                        </div>
                        <div class="form-group">
                            <label for="telephone">Numéro de téléphone</label>
                            <input type="text" id="telephone" placeholder="Votre numéro">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="sexe">Sexe</label>
                            <input type="text" id="sexe" placeholder="Votre sexe">
                        </div>
                    </div>
                </section>
                <section>
                  <h3>Lieu de résidence actuel</h3>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="adresse">Adresse</label>
                            <input type="text" id="adresse" placeholder="Votre adresse">
                        </div>
                        <div class="form-group">
                            <label for="code-postal">Code postal</label>
                            <input type="text" id="code-postal" placeholder="Votre code postal">
                        </div>
                    </div>
                </section>
                <section>
                    <h3>Informations scolaires</h3>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="ecole">Nom de l'école</label>
                            <input type="text" id="ecole" placeholder="Nom de votre école">
                        </div>
                        <div class="form-group">
                            <label for="email-etudiant">Email étudiant</label>
                            <input type="email" id="email-etudiant" placeholder="Votre email étudiant">
                        </div>
                    </div>
                    <div class="button-container">
                        <button class="button-ajouter-ecole" type="button">Votre école n'est pas reconnue ?<br> > Ajoutez la ici <</button>
                    </div>
                </section>
                <button class="save-button" type="button" onclick="saveProfile()">Sauvegarder</button>
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