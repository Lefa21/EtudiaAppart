<?php

require_once __DIR__  . '/../../vue_generique.php';

class VueResetPassword extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    private $action ="index.php?module=resetPassw&action=connexion";

    public function formulaireResetPassword(){
    ?>
        <div class="login-container">
            <p>yo</p>
        </div>
    <?php
    }
}
?>