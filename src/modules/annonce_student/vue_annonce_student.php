<?php

class VueAnnonceStudent extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function welcome()
    {
?>
        <link rel="stylesheet" href="./src/css/annonce_student.css">

        <div class="blockPage">
            <section class="section">
                <div class="image-container">
                    <img
                        src="./assets/appart.svg"
                        alt="Photo logement"
                        class="section-image" />
                </div>
            </section>
            <section class="section section-content">
                <div class="text-content">
                    <p>Ligne de texte 1</p>
                    <p>Ligne de texte 2</p>
                    <p>Ligne de texte 3</p>
                </div>
                <div class="button-container">
                    <button class="action-button">Cliquez ici</button>
                </div>
            </section>
            <section class="section section-text">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non
                    fringilla nisi. Fusce sed dapibus odio. Curabitur vel ex sit amet sem
                    blandit tempor. Mauris ultricies urna vitae eros ultrices tincidunt.
                    Suspendisse potenti.
                </p>
                <p>
                    Integer non aliquet quam. In dignissim, lectus vel posuere congue, eros
                    nulla fermentum nulla, at tempor odio nisl vel arcu. Vivamus a suscipit
                    sapien, id convallis urna.
                </p>
                <p>
                    Donec nec mauris ut ex posuere fringilla. In hac habitasse platea dictumst.
                    Phasellus pharetra tincidunt tellus, nec porttitor ligula facilisis in.
                </p>
            </section>
        </div>
<?php
    }
}
