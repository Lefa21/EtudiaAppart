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
        <div class="schools">
            <div class="school_top_text">
                <h1>Voici nos écoles partenaires</h1>
            </div>
        </div>
        <div class="image-slider">
            <!-- Première image -->
            <div class="image-container">
            <h1 class="title">L'ISEP</h1>
            <img src="isep.jpg" alt="Image 1">
            <div class="gradient-overlay">
                <div class="text-overlay">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget tortor nec nulla venenatis cursus. 
                Quisque tempor convallis arcu, a tincidunt magna fermentum in. Integer scelerisque tincidunt arcu, 
                ac vehicula ligula ornare ut. Fusce malesuada vehicula varius.
                </div>
            </div>
            </div>
            <!-- Deuxième image -->
            <div class="image-container">
            <h1 class="title">La Sorbonne</h1>
            <img src="sorbonne.jpg" alt="Image 2">
            <div class="gradient-overlay">
                <div class="text-overlay">
                Vivamus nec mauris vitae lacus varius auctor. Phasellus vitae nisi nec enim interdum placerat. 
                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. 
                Nulla facilisi. Duis eget libero ut felis tempor tristique.
                </div>
            </div>
            </div>
            <!-- Troisième image -->
            <div class="image-container">
            <h1 class="title">L'ESILV</h1>
            <img src="esilv.jpg" alt="Image 3">
            <div class="gradient-overlay">
                <div class="text-overlay">
                Donec vitae nisi a ligula dictum volutpat a sit amet arcu. Sed tristique magna eu neque sagittis, 
                id ultricies elit condimentum. Aliquam erat volutpat. Nullam nec velit sed nunc consequat luctus.
                </div>
            </div>
            </div>
        </div>
        <?php
    }
}