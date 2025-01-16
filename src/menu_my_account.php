<?php
function getUserId($email)
{
  $query = "
    SELECT 
        u.id_user, u.email
    FROM 
        User u
    WHERE 
        u.email = :email
";
  $stmt = Connexion::getBdd()->prepare($query);
  $stmt->bindParam(':email', $email, PDO::PARAM_STR);
  $stmt->execute();
  return $stmt->fetch(PDO::FETCH_ASSOC)['id_user'];
}

function getUserData()
{
  $userId = $_SESSION['userId'];
  $query = "
    SELECT 
        u.id_user, u.first_name, u.last_name, u.profile_status, u.email, u.school_name
    FROM 
        User u
    WHERE 
        u.id_user = :userId
";

  $stmt = Connexion::getBdd()->prepare($query);

  $stmt->bindParam(':userId', $userId, PDO::PARAM_STR);

  $stmt->execute();

  return $stmt->fetch(PDO::FETCH_ASSOC);
}

$_SESSION['userId'] = getUserId($_SESSION['identifiant_utilisateur']);
$userInfo = getUserData();

// $uri = module value
$uri = $_SERVER['REQUEST_URI'];
$uri = explode('module=', explode('&', explode('?', $uri)[1])[0])[1];
?>

<link rel="stylesheet" href="./src/css/menu_my_account.css">
<aside class="sidebar" role="complementary" aria-label="Navigation latérale">
  <div class="user-info">
    <img src="assets/photo_profil.png" alt="Photo de profil de l'utilisateur" class="profile-icon" width="49" height="49" />
    <div class="user-details">
      <span class="user-name"><?= $userInfo['first_name'] . ' ' . $userInfo['last_name'] ?></span>
      <span class="user-role"><?php if (isset($userInfo['profile_status'])) {
                                echo "Profil " . $userInfo['profile_status'];
                              } ?></span>
    </div>
  </div>

  <nav class="nav-menu" role="navigation" aria-label="Menu principal">
    <a href="index.php?module=monProfil&action=Profil" ref='monProfil' class="nav-item">
      <img src="assets/icon_profil.svg" alt="" class="nav-icon" width="30" height="30" aria-hidden="true" />
      <span>Profil</span>
    </a>
    <a href="index.php?module=records&action=monDossier" ref='records' class="nav-item">
      <img src="assets/icon_documents_profile.svg" alt="" class="nav-icon" width="30" height="30" aria-hidden="true" />
      <span>Mon dossier</span>
    </a>
    <a href="index.php?module=owner_requests&action=follow-up_owner_requests" ref='owner_requests' class="nav-item" aria-current="page">
      <img src="assets/icon_follow_request.svg" alt="" class="nav-icon" width="30" height="30" aria-hidden="true" />
      <span>Suivi des demandes</span>
    </a>
    <a href="index.php?module=owner_requests&action=manage_application" ref='owner_requests2' class="nav-item">
      <img src="assets/gerer_demande.svg" alt="" class="nav-item-icon">
      <span>Gérer mes demandes</span>
    </a>
    <a href="index.php?module=messagerie" ref='messagerie' class="nav-item">
      <img src="assets/icon_messages_profile.svg" alt="" class="nav-icon" width="30" height="30" aria-hidden="true" />
      <span>Messagerie</span>
    </a>
    <a href="#favorites" ref='favorites' class="nav-item">
      <img src="assets/icon_wishlist.svg" alt="" class="nav-icon" width="30" height="30" aria-hidden="true" />
      <span>Mes favoris</span>
    </a>
    <button type="button" class="settings-button" aria-label="Accéder aux paramètres" onclick="window.location.replace('index.php?module=monProfil&action=Profil')">Paramètres</button>
  </nav>
  <script>
    const nav_items = document.getElementsByClassName('nav-menu')[0].children;
    for (let index = 0; index < nav_items.length; index++) {
      const element = nav_items[index];
      console.log(element.getAttribute('ref'));
      if (element.getAttribute('ref') == "<?= $uri ?>") {
        console.log(element);
        element.classList = 'nav-item active'
      }
    }
  </script>
</aside>