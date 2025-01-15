<?php
class VueCGU extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }
    public function cgu()
    {
        ?>
        <main>
            <link rel="stylesheet" href="./src/css/cgu.css">
            <div class="body_container">
                <h1>Mentions Légales</h1>

                <h2>Éditeur du site</h2>

                <p>Le site EtudiAppart est édité par :<br>
                    Nom de l’éditeur : Alliance 6<br>
                    Siège social : 10 rue de Vanves, Issy-les-moulineaux, 92130<br>
                    Numéro SIRET : 789201000378</p>

                <h2>Hébergeur du site</h2>

                <p>Le site EtudiAppart est hébergé par :<br>
                    Nom de l’hébergeur : Herogu<br>
                    Site web : <a href="https://herogu.garageisep.com/">https://herogu.garageisep.com/</a></p>

                <h2>Propriété intellectuelle</h2>

                <p>L’ensemble des contenus présents sur le site EtudiAppart, incluant, de manière non limitative, les graphismes, images, textes, vidéos, animations, sons, logos, gifs et icônes ainsi que leur mise en forme sont la propriété exclusive d'Alliance 6, à l’exception des marques, logos ou contenus appartenant à d’autres sociétés partenaires ou auteurs.<br>
                    Toute reproduction, distribution, modification, adaptation, retransmission ou publication, même partielle, de ces différents éléments est strictement interdite sans l’accord écrit d'Alliance 6. Cette représentation ou reproduction, par quelque procédé que ce soit, constitue une contrefaçon sanctionnée par les articles L.335-2 et suivants du Code de la propriété intellectuelle.</p>

                <h2>Limitation de responsabilité</h2>

                <p>Les informations contenues sur le site EtudiAppart sont aussi précises que possible et le site est périodiquement remis à jour, mais peut toutefois contenir des inexactitudes, des omissions ou des lacunes. Si vous constatez une lacune, erreur ou ce qui paraît être un dysfonctionnement, merci de bien vouloir le signaler par e-mail à <a href="mailto:etudiapart@alliance6.fr"></a></p>

                <p>Tout contenu téléchargé se fait aux risques et périls de l’utilisateur et sous sa seule responsabilité. En conséquence, l’éditeur du site ne saurait être tenu responsable d’un quelconque dommage subi par l’ordinateur de l’utilisateur ou d’une quelconque perte de données consécutives au téléchargement.</p>

                <p>Les photos sont non contractuelles.</p>

                <p>Les liens hypertextes mis en place dans le cadre du site internet en direction d’autres ressources présentes sur le réseau Internet ne sauraient engager la responsabilité de l’éditeur du site.</p>

                <h2>Protection des données personnelles</h2>

                <p>Conformément au Règlement Général sur la Protection des Données (RGPD) et à la loi Informatique et Libertés, vous disposez d'un droit d'accès, de rectification, de suppression et d'opposition aux données personnelles vous concernant.</p>

                <p>Les informations collectées sur le site EtudiAppart sont destinées exclusivement à un usage interne et ne sont en aucun cas cédées à des tiers.</p>

                <p>Pour exercer vos droits, vous pouvez nous contacter à l’adresse suivante :</p>

                <p>Adresse e-mail : <a href="mailto:etudiappart@alliance6.fr"></a></p>

            </div>
        </main>

<?php
    }
}