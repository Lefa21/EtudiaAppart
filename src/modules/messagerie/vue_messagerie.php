<?php

require_once __DIR__  . '/../../vue_generique.php';
class VueMessagerie extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function messagerie($data)
    {
        if (empty($data)) { ?>
          <link rel="stylesheet" href="./src/css/messagerie.css">
          <main class="student-profile" role="main">
              <?php include "./src/menu_my_account.php"; ?>
            <div class="main-content-profile">
              <h2 id="title">Discussions</h2>
              <div id="discussions">
                No discussions yet
              </div>
            </div>
          </main>

         <?php } else { ?>
      <link rel="stylesheet" href="./src/css/messagerie.css">
      <main class="student-profile" role="main">
          <?php include "./src/menu_my_account.php"; ?>
        <div class="main-content-profile">

          <h2 id="title">Discussions</h2>
          <form id="discussions" method="post" action="index.php?module=messagerie&action=conversation">
            <?php foreach ($data as $key => $conversation) { ?>

                <div class="discussion">
                  <img src="./assets/photo_profil.png" alt="pp" class="pp">
                  <div class="infos_conv">
                    <div class="name">
                    <?= $conversation["first_name"] .
                        " " .
                        $conversation["last_name"] ?>
                    </div>
                    <div class="last_mess_time">
                        <div class="last-message">
                            <?php if (strlen($conversation["content"]) < 15) {
                                echo $conversation["content"];
                            } else {
                                echo substr($conversation["content"], 0, 15) . "...";
                            } ?>
                        </div>
                      -
                        <div class="time">
                            <?php
                            $diff = (new DateTime())->diff(
                                new DateTime($conversation["sent_at"])
                            );
                            if ($diff->d > 1) {
                                echo $diff->d . " days ago";
                            } elseif ($diff->h >= 1) {
                                echo $diff->h . " hours ago";
                            } else {
                                echo $diff->i . " minutes ago";
                            }
                            ?>
                        </div>
                    </div>
                  </div>
                  <input type="submit" name="<?= $key ?>" value="Voir la conversation" class="voir_conv">
                </div>

                <?php } ?>

          </form>
        </div>
      </main>
        <?php }
    }

    public function conversation($data)
    {
        ?>
      <link rel="stylesheet" href="./src/css/messagerie.css">
      <main class="student-profile" role="main">
          <?php include "./src/menu_my_account.php"; ?>
        <div class="main-content-profile">
          <div class="entete">
            <a class="retour" href="index.php?module=messagerie&action=messagerie">
              <svg class="retour" id="retour"  viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_471_1839)">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M21.9319 13.6023L14.9583 20.5759C14.6555 20.8787 14.1647 20.8787 13.8619 20.5759C13.5591 20.2732 13.5591 19.7823 13.8619 19.4795L19.5134 13.829H4.33712C3.90918 13.829 3.56227 13.4821 3.56227 13.0541C3.56227 12.6262 3.90918 12.2793 4.33712 12.2793H19.5134L13.8619 6.62873C13.5591 6.32597 13.5591 5.83509 13.8619 5.53233C14.1647 5.22956 14.6555 5.22956 14.9583 5.53233L21.9319 12.5059C22.0774 12.6513 22.1592 12.8485 22.1592 13.0541C22.1592 13.2598 22.0774 13.457 21.9319 13.6023Z" fill="#041A8F"/>
              </g>
              <defs>
                <clipPath id="clip0_471_1839">
                  <rect width="24.795" height="24.795" fill="white" transform="translate(0.462891 0.656616)"/>
                </clipPath>
              </defs>
            </svg>
            </a>
            <h2 id="title">Conversation avec <?php print_r ($_SESSION['nom_conv'])?></h2>
          </div>
          <div class="conv">
                <?php foreach ($data as $conversation) {
                    if ($_SESSION['idreceiver'] == $conversation["receiver_id"]) { ?>
                      <div class="message-sent">
                        <div class="message-time">
                            <?php
                            $diff = (new DateTime())->diff(
                                new DateTime($conversation["sent_at"])
                            );
                            if ($diff->d > 1) {
                                echo $diff->d . " days ago";
                            } elseif ($diff->h >= 1) {
                                echo $diff->h . " hours ago";
                            } else {
                                echo $diff->i . " minutes ago";
                            }
                            ?>
                        </div>
                        <div class="message-content sent">
                            <?= $conversation["content"] ?>
                        </div>
                      </div>
                    <?php } elseif ($_SESSION['idsender'] == $conversation["receiver_id"]) { ?>
                      <div class="message-received">
                        <div class="message-content received">
                            <?= $conversation["content"] ?>
                        </div>
                        <div class="message-time">
                            <?php
                            $diff = (new DateTime())->diff(
                                new DateTime($conversation["sent_at"])
                            );
                            if ($diff->d > 1) {
                                echo $diff->d . " days ago";
                            } elseif ($diff->h >= 1) {
                                echo $diff->h . " hours ago";
                            } else {
                                echo $diff->i . " minutes ago";
                            }
                            ?>
                        </div>
                      </div>
                    <?php }
                } ?>
            </div>

            <form method="post" action="index.php?module=messagerie&action=envoyerMessage">
              <div class="send-message">
                <input type="text" name="message" class="message" placeholder="Message">
                <input type="submit" name="submit" class="send_mess" value="Envoyer">
              </div>
            </form>
        </div>
      </main>

<?php
    }
}
?>
