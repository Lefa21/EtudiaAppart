<?php

class VueHome extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function welcome()
    {
        ?>
        <div class="welcome">
            <div class="welcome_text">
                <h1>EtudiAppart</h1>
                <p>Site de gestion de location étudiante</p>
            </div>
        </div>
        <?php
    }
}