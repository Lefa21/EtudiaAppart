<?php

require_once __DIR__  . '/../../vue_generique.php';

class VueFavorites extends VueGenerique
{
  public function __construct()
  {
    parent::__construct();
  }

  public function displayFavorites($favorites)
  {
?>
    <main>
      <?php
      include "./src/menu_my_account.php";
      ?>
      <style>
        main {
          display: flex;
          flex-direction: row;
          margin-top: 20px;
          /* Réduit de 40px à 20px */
          background: var(--background-color-white);
          padding-bottom: 49px;
          height: 100vh;
        }

        aside {
          display: flex;
          flex-direction: column;
          text-align: left;
          width: 100%;
          overflow-y: auto;
        }

        .property-grid {
          margin-top: 20px;
          /* Réduit la marge du haut */
          width: 70%;
          max-width: 1826px;
          display: flex;
          gap: 20px;
          flex-wrap: wrap;
          padding: 20px;
        }

        /* Le reste du CSS reste identique */

        .property-card {
          border-radius: 5px;
          border: 3px solid #000;
          padding: 16px 18px 27px;
          display: flex;
          flex-direction: column;
          justify-content: space-between;
          /* Ajoute cette ligne pour répartir l'espace */
          transition: transform 0.3s;
          background: #fff;
          width: 300px;
          height: 500px;
          flex: 0 0 auto;
          box-sizing: border-box;
        }

        .property-image {
          width: 100%;
          height: 250px;
          /* Hauteur fixe pour l'image */
          border-radius: 5px;
          object-fit: cover;
        }

        /* Pour les petits écrans */
        @media (max-width: 991px) {
          .property-grid {
            width: 100%;
            margin-top: 40px;
            justify-content: center;
            /* Centre les cards */
          }
        }
      </style>
      <aside>
        <h1>Mes annonces en favoris</h1>
        <section class="property-grid">
          <?php if (!empty($favorites)): ?>
            <?php foreach ($favorites as $ad): ?>
              <article class="property-card">
                <img src="assets/default_property.jpg" alt="Property" class="property-image" />
                <div class="property-info">
                  <p><strong>Titre :</strong> <?php echo htmlspecialchars($ad['ad_title']); ?></p>
                  <p><strong>Prix :</strong> <?php echo htmlspecialchars($ad['rent_price']); ?> €</p>
                  <p><strong>Date début :</strong> <?php echo htmlspecialchars($ad['formatted_start_date']); ?></p>
                  <p><strong>Date fin :</strong> <?php echo htmlspecialchars($ad['formatted_end_date']); ?></p>
                </div>
              </article>
            <?php endforeach; ?>
          <?php else: ?>
            <p>Vous n'avez aucune annonce en favoris.</p>
          <?php endif; ?>
        </section>
      </aside>

    </main>
<?php
  }
}
