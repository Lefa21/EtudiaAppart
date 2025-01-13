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

        <div class="header">



  <h1>À propos d'EtudiAppart</h1>

</div>



<div class="actions">

  <h2>Nos actions</h2>

  <p>Centraliser toutes les offres au même endroit - Rendre les démarches simples et rapides - T'accompagner pour que tu y trouves ton futur chez-toi</p>

</div>



<div class="features">

  <h2>Ce que tu trouveras ici</h2>

  <div class="features-container">

    <div class="feature">

      <h3>Des annonces faciles à chercher</h3>

      <p>Trouves des logements proposés par des particuliers, le CROUS ou d'autres étudiants.</p>

    </div>

    <div class="feature">

      <h3>Une gestion des annonces rapide</h3>

      <p>Les propriétaires peuvent publier ou modifier leurs offres en quelques clics.</p>

    </div>

    <div class="feature">

      <h3>Des outils pour t'aider à naviguer</h3>

      <p>Sauvegardes tes annonces préférées.</p>

    </div>

    <div class="feature">

      <h3>Postules directement pour un logement</h3>

      <p>Poses tes questions aux propriétaires.</p>

    </div>

    <div class="feature">

      <h3>Une section coloc' dédiée</h3>

      <p>Trouves ou proposes une colocation avec d'autres étudiants.</p>

    </div>

  </div>

</div>



<div class="team">

  <h2>Nos membres de l'équipe</h2>

  <p>Nous sommes une équipe de jeunes passionnés, déterminés à rendre la recherche de logement plus facile pour les étudiants. Nous avons travaillé tous ensemble pour créer le site qui vas t'aider à trouver ton logement étudiant rapidement et facilement. Voici les membres de notre équipe : </p>

  <div class="team-container">

    <div class="team-member">

      <div class="avatar">
      <img src="assets\fael emoji.png" alt="Profile photo" class="avatar">
      </div>

      

      <h3>Faël Ben Youssef</h3>

      <p>Référent Technique</p>

    </div>

    <div class="team-member">

      <div class="avatar"></div>

      <h3>Angeline Chapuis</h3>

      <p>Fondatrice</p>

    </div>

    <div class="team-member">

      <div class="avatar"></div>

      <h3>Amine Akhrib</h3>

      <p>Développeur</p>

    </div>

    <div class="team-member">

      <div class="avatar"></div>

      <h3>Janna Djemai</h3>

      <p>Community manager</p>

    </div>

    <div class="team-member">

      <div class="avatar"></div>

      <h3>Tristan Passedat</h3>

      <p>Designer</p>

    </div>

    <div class="team-member">

      <div class="avatar"></div>

      <h3>Antoine Bonhomme</h3>

      <p>Développeur</p>

    </div>

  </div>

</div>



<div class="values">

  <h2>Nos valeurs</h2>

  <div class="values-container">

    <div class="value">

      <h3>Solidarité</h3>

      <p>On se soutient tous dans la recherche.</p>

    </div>

    <div class="value">

      <h3>L'entraide</h3>

      <p>Chaque membre de l'équipe est là pour t'aider.</p>

    </div>

    <div class="value">

      <h3>L'accompagnement</h3>

      <p>On te guide à chaque étape.</p>

    </div>

    <div class="value">

      <h3>La simplicité</h3>

      <p>On rend tout facile, même pour les non-initiés.</p>

    </div>

  </div>

</div>
        <?php
    }
}

