<?php

class VueMessagerie extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function messagerie($data)
    {
        ?>
      <link rel="stylesheet" href="./src/css/messagerie.css">
      <main class="student-profile" role="main">
          <?php
          include "./src/menu_my_account.php";
          ?>
        <div class="main-content-profile">

          <h2 id="title">Discussions</h2>
          <div class="search-bar">
            <input type="text" placeholder="Search">
          </div>
          <div id="discussions">
            <?php
            foreach ($data as $key => $conversation) {
                ?>
              <a href="index.php?module=messagerie&action=conversation&id_sender=<?=$conversation['sender_id']?>" class="discussion">
                <div class="text-content">
                  <div class="name">
                  <?= $conversation['first_name'] . ' ' . $conversation['last_name'] ?>
                  </div>
                  <div class="time">
                      <?php
                      $diff = (new DateTime())->diff(new DateTime($conversation['sent_at']));
                      if ($diff->d > 1) {
                          echo $diff->d . ' days ago';
                      } elseif ($diff->h >= 1) {
                          echo $diff->h . ' hours ago';
                      } else {
                          echo $diff->i . ' minutes ago';
                      }
                      ?>
                  </div>
                </div>
                  <div class="last-message">
                      <?php
                      if (strlen($conversation['content']) < 15) {
                          echo $conversation['content'];
                      } else {
                          echo substr($conversation['content'], 0, 15) . '...';
                      }
                      ?>
                  </div>
                <?php
            }
        ?>
              </a>
          </div>
        </div>
      </main>
        <?php
    }


    public function conversation($data, $id_sender)
    {
        ?>
      <link rel="stylesheet" href="./src/css/messagerie.css">
      <main class="student-profile" role="main">
          <?php
          include "./src/menu_my_account.php";
          ?>
        <div class="main-content-conversation">
            <?php
            foreach ($data as $key => $conversation){

//              if ($conversation['sender_id']=)
//              {
//                  print_r($conversation);
//              }
            }
            ?>
        </div>
      </main>

<?php
    }
}
?>