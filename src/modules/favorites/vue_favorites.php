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
          margin-top: 40px;
          background: var(--background-color-white);
          padding-bottom: 49px;
        }

        aside{
            display: flex;
            flex-direction: column;
            text-align: left;
            width: 100%;

          }

        .property-grid {
          margin-top: auto;
          width: 70%;
          max-width: 1826px;
          display: flex;
          gap: 20px;
          flex-wrap: wrap;
        }

        .property-card {
          border-radius: 5px;
          border: 3px solid #000;
          padding: 16px 18px 27px;
          display: flex;
          flex-direction: column;
          transition: transform 0.3s;
          background: #fff;
          flex: 1 1 calc(33.333% - 20px);
          box-sizing: border-box;
        }

        .property-card:hover,
        .property-card:focus-within {
          transform: translateY(-5px);
        }

        .property-image {
          width: 100%;
          border-radius: 5px;
          aspect-ratio: 1.05;
          object-fit: cover;
        }

        .property-info {
          margin-top: 20px;
          font-size: 20px;
        }

        .property-info h3 {
          margin: 0 0 10px 0;
          font-size: 1em;
        }

        .property-info p {
          margin: 5px 0;
        }

        @media (max-width: 991px) {
          .property-grid {
            max-width: 100%;
            margin-top: 40px;
            flex-direction: column;
          }

          .property-card {
            width: 100%;
          }
        }

        @media (prefers-reduced-motion: reduce) {
          .property-card {
            transition: none;
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
