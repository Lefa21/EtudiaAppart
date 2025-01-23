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
    <main class="student-profile">
      <?php include "./src/menu_my_account.php"; ?>
      <style>
        .main-content-favorites {
          display: flex;
          flex-direction: column;
          width: 80%;
          margin: 16px 0 0 16px;
        }

        h1 {
          color: var(--text-color-blue);
          font: 800 36px/1 var(--police-text);
          letter-spacing: -1px;
        }

        .property-grid {
          margin-top: 20px;
          width: 100%;
          display: flex;
          gap: 20px;
          flex-wrap: wrap;
        }

        .property-card {
          border-radius: 8px;
          border: var(--secondary-color) 1px solid;
          padding: 20px;
          display: flex;
          flex-direction: column;
          justify-content: space-between;
          background: var(--background-color-white);
          width: 300px;
          height: 500px;
          flex: 0 0 auto;
          box-sizing: border-box;
        }

        .property-image {
          width: 100%;
          height: 250px;
          border-radius: 8px;
          object-fit: cover;
        }

        .property-info {
          color: var(--text-color-blue);
          font: 400 16px/1.5 var(--police-text);
        }

        .property-info p {
          margin: 5px 0;
        }

        @media (max-width: 768px) {
          .main-content-favorites {
            width: 100%;
            margin: 16px 0;
          }

          .property-grid {
            justify-content: center;
          }

          .property-card {
            width: 100%;
            max-width: 300px;
          }
        }

        @media (max-width: 480px) {
          h1 {
            font-size: 28px;
          }

          .property-card {
            padding: 10px;
          }
        }
      </style>

      <div class="main-content-favorites">
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
      </div>
    </main>
<?php
  }
}
