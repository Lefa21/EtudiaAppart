<?php

class VueSettings extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function showSettingsPage(){
      ?>
      <div style="margin: 20px; font-family: Arial, sans-serif;">
        <!-- Section 1: Theme Toggle -->
        <div style="margin-bottom: 20px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
          <h2>Thème du site</h2>
          <label>
            <input type="checkbox" id="themeToggle" onchange="toggleTheme()">
            Mode Nuit / Jour
          </label>
        </div>

        <!-- Section 2: Language Selector -->
        <div style="border-bottom: 1px solid #ccc; padding-bottom: 10px;">
          <h2>Langues du site</h2>
          <label for="languageSelect">Choisir une langue :</label>
          <select id="languageSelect">
            <option value="fr">Français</option>
            <option value="en">Anglais</option>
            <option value="es">Espagnol</option>
          </select>
        </div>
      </div>

      <script src="/path/to/toggleTheme.js"></script>
      <?php
    }
}
?>
