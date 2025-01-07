<?php

class VueMessagerie extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function messagerie()
    {
        ?>
        <link rel="stylesheet" href="./src/css/messagerie.css">
        <div class="main-content-profile">
            <?php
            include "./src/menu_my_account.php";
            ?>
          <h2>Discussions</h2>
          <div class="search-bar">
            <input type="text" placeholder="Search">
          </div>
          <div class="discussions">
              <?php foreach ($discussions as $discussion): ?>
                <div class="discussion-item">
                  <img src="<?= $discussion['profile_image'] ?>" alt="Avatar">
                  <div class="discussion-info">
                    <h3><?= htmlspecialchars($discussion['name']) ?></h3>
                    <p><?= htmlspecialchars($discussion['last_message']) ?></p>
                  </div>
                  <span class="time"><?= htmlspecialchars($discussion['time_ago']) ?></span>
                </div>
              <?php endforeach; ?>
          </div>
        </div>
        <?php
    }
}
?>