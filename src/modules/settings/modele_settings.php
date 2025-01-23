<?php

require_once __DIR__ . '/../../connexion.php';

class ModeleSettings
{
    public function __construct()
    {
        // Initialiser le thème par défaut si non défini
        if (!isset($_SESSION['user']['theme'])) {
            $_SESSION['user']['theme'] = 'light';
        }

        // Initialiser la langue par défaut si non définie
        if (!isset($_SESSION['user']['language'])) {
            $_SESSION['user']['language'] = 'fr'; // Français par défaut
        }
    }

    /**
     * Récupère le thème actuellement défini dans la session utilisateur.
     *
     * @return string Le thème actuel ('dark' ou 'light').
     */
    public function getTheme()
    {
        return $_SESSION['user']['theme'];
    }

    /**
     * Définit un nouveau thème dans la session utilisateur.
     *
     * @param string $theme Le thème à définir ('dark' ou 'light').
     */
    public function setTheme($theme)
    {
        if (in_array($theme, ['dark', 'light'])) {
            $_SESSION['user']['theme'] = $theme;
        }
    }

    /**
     * Récupère la langue actuellement définie dans la session utilisateur.
     *
     * @return string La langue actuelle ('fr', 'en', 'es').
     */
    public function getLanguage()
    {
        return $_SESSION['user']['language'];
    }

    /**
     * Définit une nouvelle langue dans la session utilisateur.
     *
     * @param string $language La langue à définir ('fr', 'en', 'es').
     */
    public function setLanguage($language)
    {
        $availableLanguages = ['fr', 'en', 'es'];
        if (in_array($language, $availableLanguages)) {
            $_SESSION['user']['language'] = $language;
        }
    }
}
