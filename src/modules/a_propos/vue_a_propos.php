<?php

require_once __DIR__  . '/../../vue_generique.php';

class VueAPropos extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    
    
    public function APropos(){
        ?>
            <link rel="stylesheet" href="./src/css/a_propos.css">
        
            <header class="entete-a_propos">
            <div class="texte-entete-a_propos">
                <h1>À propos d'EtudiAppart</h1>
            </div>
            <div class="fond-entete-a_propos">
                <img src="A.jpg" alt="Fond EtudiAppart">
            </div>
        </header>
        <section class="presentation-section">
            <h1>Bienvenue sur notre site dédié aux logements étudiants !</h1>
            <div class="container-a_propos">
                <p>Trouver un logement étudiant, c’est souvent très compliqué. Entre les offres limitées, les longues démarches et la concurrence, on sait que ce n’est pas facile. On a pour but de t’aider à trouver rapidement le logement qui te correspond.On veut que ce soit simple, pratique et adapté à tes besoins.
                    C’est pour quoi nous avons créé ce site : <span class="highlight"><strong> Pour te simplifier la vie.</strong></span>
                </p>
                <p> 3 étapes clés :</p>
                <div class="step-a_propos">
                    <Une class="step-a_propos">1. Facile à utiliser : Une interface claire et sans prise de tête.</p>

                    <Tes class="step-a_propos">2. Sécurisé : Tes données sont protégées.</p>

                    <Reçois class="step-a_propos">3. Efficace : Reçois des notifications pour ne rien rater et suis tes candidatures facilement.</p>
                </div>

                <div class="footer">
                <strong> Ensemble, simplifions ta recherche de logement ! </strong>
                </div>
            </div>
        </p>
                </section>
                <section class="actions-section">
                <h3 class="title_a_propos">Nos membres de l'équipe </h3>
            
            <p>Nous sommes une équipe de jeunes passionnés, déterminés à rendre la recherche de logement plus facile pour les étudiants. Nous avons travaillé tous ensemble pour créer le site qui vas t'aider à trouver un logement rapidement et facilement. Voici les membres de notre équipe : </p>
            
            <div class="team-a_propos">
                    <div class="team-member-a_propos">
                        <img src="https://via.placeholder.com/100" alt="Faël Ben Youssef">
                        <h3 class="title-a_propos">Faël Ben Youssef</h3>
                        <p class="text-a_propos">Référent Technique</p>
                    </div>
                    <div class="team-member-a_propos">
                        <img src="https://via.placeholder.com/100" alt="Faël Ben Youssef">
                        <h3  class="title-a_propos">Angeline Chapuis</h3>
                        <p class="text-a_propos">Fondatrice</p>
                    </div>
                    <div class="team-member-a_propos">
                        <img src="https://via.placeholder.com/100" alt="Amine Akhrib">
                        <h3 class="title-a_propos">Amine Akhrib</h3>
                        <p class="text-a_propos">Développeur</p>
                    </div>
                    <div class="team-member-a_propos">
                        <img src="https://via.placeholder.com/100" alt="Faël Ben Youssef">
                        <h3  class="title-a_propos">Janna Djemai</h3>
                        <p class="text-a_propos">Comunity manager</p>
                    </div>
                    <div class="team-member-a_propos">
                        <img src="https://via.placeholder.com/100" alt="Faël Ben Youssef">
                        <h3  class="title-a_propos">Tristan Passedat</h3>
                        <p class="text-a_propos">Designer</p>
                    </div>
                    <div class="team-member-a_propos">
                        <img src="https://via.placeholder.com/100" alt="Antoine Bonhome">
                        <h3  class="title-a_propos">Antoine Bonhomme</h3>
                        <p class="text-a_propos">Developpeur</p>
                    </div>
                </div>
            </section>

            <section class="actions-section">
            <h3 class="title_a_propos">Nos valeurs</h3>
                <div class="values-a_propos">
                
                    <div class="value"> <strong>Solidarité</strong>  <p>On se soutient tous dans la recherche.</p> </div> </br>
                    <br><div class="value"> <strong> L'entraide </strong> <p>Chaque membre de l’équipe est là pour t'aider.</p> </div></br>
                    <div class="value"><strong> L'accompagnement</strong> <p>On te guide à chaque étape.</p></div> </br>
                    <div class="value"><strong>La simplicité </strong>  <p>On rend tout facile, même pour les non-initiés.</p> </div> </br>
                    
                </div>
            </section>

            <section class="actions-section">
                <h2 class="title_a_propos">Nos actions</h2>

        <br><strong> 
            
        <br>Centraliser toutes les offres au même endroit - Rendre les démarches simples et rapides - T'accompagner pour que tu y trouves ton futur chez-toi
        </strong></br>
            </section>

            <section class="actions-section">
                <h3 class="title_a_propos">Ce que tu trouveras ici</h3>
                <section class="features-a_propos">
            
            <div class="feature-item-a_propos²">
                <h3>Des annonces faciles à chercher</h3>
                <p class="text-a_propos">Trouves des logements proposés par des particuliers, le CROUS ou d'autres étudiants.</p>
            </div>
            <div class="feature-item-a_propos²">
                <h3>Une gestion des annonces rapide</h3>
                <p class="text-a_propos">Les propriétaires peuvent publier ou modifier leurs offres en quelques clics.</p>
            </div>
            <div class="feature-item-a_propos²">
                <h3  class="title-a_propos">Des outils pour t'aider à naviguer</h3>
                <p class="text-a_propos">Sauvegardes tes annonces préférées.</p>
            </div>
            <div class="feature-item-a_propos²">
                <h3  class="title-a_propos">Postules directement pour un logement</h3>
                <p class="text-a_propos">Poses tes questions aux propriétaires.</p>
            </div>
            <div class="feature-item-a_propos²">
                <h3  class="title-a_propos">Une section coloc' dédiée</h3>
                <p class="text-a_propos">Trouves ou proposes une colocation avec d'autres étudiants.</p>
            </div>
        </section>
        <?php
    }
}