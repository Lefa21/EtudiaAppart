<?php

class VueAnnonce extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function annoncePage($data)
    {
?>
        <link rel="stylesheet" href="./src/css/annonce.css">
        <script type="text/javascript" src="./src/scripts/annonce.js"></script>

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
                    <p class="title"><?= $data['ad_title'] ?></p>
                    <p class="description"><?= $data['description'] ?></p>
                    <p class="description"><?= $data['numbers_rooms'] ?> <?php if ($data['numbers_rooms'] > 1) echo 'pièces';
                                                                            else echo 'pièce' ?> - <?= $data['surface_area'] ?>m2</p>
                    <p class="price"><?= $data['rent_price'] ?>€</p>
                    <p class="date-pub">Publiée le <?php $date = explode(' ', $data['date_publication']);
                                                    echo ($date[0] . ' à ' . $date[1]); ?></p>
                    <p class="date-dispo">Libre du <?= $data['lease_start'] ?> au <?= $data['lease_end'] ?></p>
                    <p class="category"><u>Catégorie</u> : <?= $data['type_habitation'] ?></p>
                    <p class="address"><u>Localisation</u> : <a href="https://www.google.fr/maps/place/<?= urlencode($data['address_line'] . ',+' . $data['zipCode'] . '+' . $data['city']) ?>"><?= $data['address_line'] ?> <?= $data['zipCode'] ?> <?= $data['city'] ?>, <?= $data['country'] ?></a></p>
                </div>
                <div class="button-container">
                    <button id="postuler" class="action-button postuler" type="button" onclick="adApply(<?= $data['id_ad'] ?>)">Postuler</button>
                    <button id="signaler" class="action-button signaler" type="button" onclick="adReport(<?= $data['id_ad'] ?>)"><img src="./assets/attention.png" alt="signal" class="" height="14" /> Signaler</button>
                </div>
            </section>
            <section class="section section-text">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam enim turpis, porta et condimentum eu, semper at est. Donec vitae laoreet risus. Proin lectus arcu, consectetur eget orci non, ultricies iaculis purus. Integer vulputate tempus sapien, ut viverra sapien. Praesent non tempor nisl, vitae mattis odio. Vestibulum quis dui volutpat, dictum nisl a, pulvinar enim. Phasellus consequat, dolor quis fringilla dapibus, elit magna fringilla ante, a vehicula ipsum lacus id tellus. Donec placerat libero at dui varius, a efficitur dui pellentesque. Suspendisse scelerisque risus ac luctus convallis. Fusce accumsan imperdiet laoreet. Suspendisse eu nibh vitae libero facilisis bibendum. Phasellus cursus tempor augue nec rhoncus. Maecenas rutrum ante nec lorem vehicula accumsan. Nam sit amet cursus ipsum. Proin gravida eu urna id tempus. Aliquam dictum tortor eget mattis placerat.
                </p>
                <p>
                    Etiam tempor, quam sit amet mollis placerat, arcu massa rhoncus massa, eu lobortis quam lorem in nisl. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ultricies sed quam sed ultrices. Duis quis neque vulputate dui dapibus rutrum at vel nisi. Maecenas sed nunc bibendum, placerat turpis in, pulvinar orci. Sed cursus nunc vel odio dictum fermentum. Donec nec eros erat. Duis nunc eros, ornare sit amet molestie vel, egestas at erat. Ut et sapien eget justo semper volutpat faucibus ac arcu. Ut sit amet turpis auctor, malesuada ligula a, vulputate odio. Curabitur varius ornare nibh sit amet suscipit. Morbi in diam libero.
                </p>
                <p>
                    Sed lacinia, nulla eget interdum condimentum, eros tellus maximus erat, vitae euismod velit lectus sed felis. Integer non nunc eget sapien dapibus tristique tempor eget dolor. Mauris suscipit ultrices nunc, at commodo eros varius finibus. Vestibulum luctus lorem non leo lacinia, lobortis dapibus nulla vulputate. Donec quis leo ipsum. Etiam at dapibus neque. Mauris id dui non enim rutrum sodales in vel magna.
                </p>
            </section>
        </div>
<?php
    }
}
