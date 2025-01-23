<?php

class VueSchools extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function schools()
    {
        ?>
        <link rel="stylesheet" href="./src/css/schools.css">
        <div class="image-slider">
            <!-- Première image -->
            <div class="image-container">
            <h1 class="title">L'ISEP</h1>
            <img src="./assets/isep.jpg" alt="Image 1">
            <div class="gradient-overlay">
                <div class="text-overlay">
                École d'ingénieurs située à Paris, orientée vers les technologies numériques, incluant l'informatique, les télécommunications, et l'électronique. Elle est reconnue pour son approche pratique et ses partenariats internationaux.
                </div>
            </div>
            </div>
            <!-- Deuxième image -->
            <div class="image-container">
            <h1 class="title">La Sorbonne</h1>
            <img src="./assets/sorbonne.png" alt="Image 2">
            <div class="gradient-overlay">
                <div class="text-overlay">
                Une université prestigieuse et multidisciplinaire regroupant plusieurs facultés (sciences, lettres, médecine) située à Paris. Elle est réputée pour son excellence académique et sa contribution à la recherche.
                </div>
            </div>
            </div>
            <!-- Troisième image -->
            <div class="image-container">
            <h1 class="title">L'ESILV</h1>
            <img src="./assets/esilv.png" alt="Image 3">
            <div class="gradient-overlay">
                <div class="text-overlay">
                Une école d'ingénieurs située à Paris-La Défense, spécialisée dans les domaines de l'ingénierie numérique, la finance, l'intelligence artificielle, et la technologie. Elle favorise les projets interdisciplinaires avec d'autres écoles du Pôle Léonard de Vinci.
                </div>
            </div>
            </div>
        </div>
        <?php
    }
}