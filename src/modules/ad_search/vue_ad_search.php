<?php

require_once __DIR__  . '/../../vue_generique.php';

class VueSearchAd extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    
    public function showSearchAd(){
        ?>
<style>
.visually-hidden {
  position: absolute;
  width: 1px;
  height: 1px;
  padding: 0;
  margin: -1px;
  overflow: hidden;
  clip: rect(0, 0, 0, 0);
  border: 0;
}

.student-housing {
  background: var(--White, #fff);
  display: flex;
  flex-direction: column;
  overflow: hidden;
}

.header {
  background: var(--Primary, #041a8f);
  display: flex;
  width: 100%;
  gap: 40px 100px;
  flex-wrap: wrap;
  padding: 29px 20px;
}

.logo-container {
  display: flex;
  gap: 20px;
}

.logo {
  width: 110px;
  aspect-ratio: 1;
  object-fit: contain;
}

.brand-name {
  color: var(--White, #fff);
  text-align: center;
  font: 400 64px Inter, sans-serif;
  margin: auto 0;
}

.nav-menu {
  display: flex;
  align-items: center;
  gap: 39px;
  color: var(--White, #fff);
  text-align: center;
  flex-wrap: wrap;
  margin: auto 0;
  font: 400 32px Inter, sans-serif;
}

.nav-link {
  font-weight: 500;
  text-decoration: underline;
}

.post-listing-btn {
  border-radius: 10px;
  background: var(--White, #fff);
  color: var(--Dark-Gray---Field-text, #636363);
  padding: 19px 6px;
}

.user-icon {
  width: 56px;
  aspect-ratio: 1;
  object-fit: contain;
}

.auth-btn {
  border-radius: 5px;
  border: 2px solid var(--White, #fff);
  box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
  font-size: 24px;
  padding: 13px 14px;
  color: var(--White, #fff);
  text-decoration: underline;
}

.auth-btn-filled {
  background: var(--White, #fff);
  color: var(--Dark-Gray---Field-text, #636363);
  text-decoration: none;
}

.main-content {
  display: flex;
  flex-direction: column;
  border-radius: 10px;
  position: relative;
  min-height: 912px;
  width: 100%;
  gap: 20px;
  flex-wrap: wrap;
  justify-content: space-between;
  padding: 13px 65px 0;
}

.background-image {
  position: absolute;
  inset: 0;
  height: 100%;
  width: 100%;
  object-fit: cover;
}

.search-section {
  position: relative;
  display: flex;
  flex-direction: column;
  width: 50%;
}

.search-container {
  border-radius: 10px;
  background: var(--Secondary, #ccd8ff);
  display: flex;
  width: 100%;
  flex-direction: column;
  color: var(--Primary, #041a8f);
  text-align: center;
  padding: 15px 15px 35px;
  font: 400 24px Inter, sans-serif;
}

.search-input {
  border-radius: 10px;
  background: var(--White, #fff);
  padding: 19px;
  width: 100%;
}

.filter-container {
  display: flex;
  gap: 30px;
  margin: 16px 0 0 14px;
}

.listings-container {
  border-radius: 10px;
  background: var(--Secondary, #ccd8ff);
  display: flex;
  margin-top: -10px;
  width: 100%;
  flex-direction: column;
  padding: 10px 16px;
}

.listing-card {
  border-radius: 10px;
  background: var(--Primary, #041a8f);
  box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
  padding: 16px;
  margin-bottom: 21px;
  display: flex;
  gap: 20px;
}

.listing-image {
  width: 156px;
  aspect-ratio: 1.14;
  object-fit: contain;
  border-radius: 10px;
  box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
}

.listing-details {
  display: flex;
  flex-direction: column;
  color: var(--White, #fff);
  font-family: Inter, sans-serif;
}

.listing-title {
  font-size: 24px;
  font-weight: 600;
}

.listing-location {
  font-size: 20px;
  margin-top: 12px;
}

.listing-meta {
  display: flex;
  margin-top: 14px;
  gap: 40px 42px;
  justify-content: space-between;
}

.listing-date {
  font-size: 14px;
  align-self: end;
}

.listing-price {
  font-size: 48px;
}
#searchInput.search-input::placeholder {
    color: #041a8f !important;
    font-family: "Inter", sans-serif !important;
    font-size: 24px !important;
    font-weight: 400 !important;
}

@media (max-width: 991px) {
  .header,
  .main-content,
  .search-section,
  .listings-container,
  .listing-card {
    max-width: 100%;
  }

  .main-content {
    padding: 0 20px;
  }

  .logo-container {
    flex-direction: column;
    align-items: stretch;
    gap: 0;
  }

  .logo {
    margin-top: 34px;
  }

  .brand-name {
    margin-top: 40px;
    font-size: 40px;
  }

  .listing-price {
    font-size: 40px;
  }

  .listing-card {
    flex-direction: column;
  }

  .listing-image {
    margin-top: 33px;
  }

  .listing-details {
    margin-top: 33px;
  }


}
</style>

<div class="student-housing">

  <main class="main-content">
    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/bc69f494108b7c619c18f3af51a47728741e116b5dff0abed02b180b2972b448?placeholderIfAbsent=true&apiKey=6a478c02df5747629a6f45b8f66c4701" alt="" class="background-image" />
    
    <section class="search-section">
      <div class="search-container">
        <label for="searchInput" class="visually-hidden">Rechercher une annonce</label>
        <input  type="search" id="searchInput" class="search-input" placeholder="Rechercher une annonce"/>
        <div class="filter-container">
          <a>Filtrer</a>
          <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/930ed09bdd7c7d1d5f487849bb0435f7b3c002d5c4644665b4dca196c4fc511c?placeholderIfAbsent=true&apiKey=6a478c02df5747629a6f45b8f66c4701" alt="" />
        </div>
      </div>

      <div class="listings-container">
        <article class="listing-card">
          <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/37d701560e13409553e0496680f30601885277591f604e8855013204fa881990?placeholderIfAbsent=true&apiKey=6a478c02df5747629a6f45b8f66c4701" alt="Apartment interior view" class="listing-image" />
          <div class="listing-details">
            <h2 class="listing-title">Logement étudiant</h2>
            <p class="listing-location">Paris 75015</p>
            <div class="listing-meta">
              <time class="listing-date">Publiée le 27/09/24 20h35</time>
              <p class="listing-price">550€</p>
            </div>
          </div>
        </article>

        <article class="listing-card">
          <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/37d701560e13409553e0496680f30601885277591f604e8855013204fa881990?placeholderIfAbsent=true&apiKey=6a478c02df5747629a6f45b8f66c4701" alt="Apartment interior view" class="listing-image" />
          <div class="listing-details">
            <h2 class="listing-title">Logement étudiant</h2>
            <p class="listing-location">Paris 75015</p>
            <div class="listing-meta">
              <time class="listing-date">Publiée le 27/09/24 20h35</time>
              <p class="listing-price">550€</p>
            </div>
          </div>
        </article>

        <article class="listing-card">
          <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/37d701560e13409553e0496680f30601885277591f604e8855013204fa881990?placeholderIfAbsent=true&apiKey=6a478c02df5747629a6f45b8f66c4701" alt="Apartment interior view" class="listing-image" />
          <div class="listing-details">
            <h2 class="listing-title">Logement étudiant</h2>
            <p class="listing-location">Paris 75015</p>
            <div class="listing-meta">
              <time class="listing-date">Publiée le 27/09/24 20h35</time>
              <p class="listing-price">550€</p>
            </div>
          </div>
        </article>

        <article class="listing-card">
          <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/37d701560e13409553e0496680f30601885277591f604e8855013204fa881990?placeholderIfAbsent=true&apiKey=6a478c02df5747629a6f45b8f66c4701" alt="Apartment interior view" class="listing-image" />
          <div class="listing-details">
            <h2 class="listing-title">Logement étudiant</h2>
            <p class="listing-location">Paris 75015</p>
            <div class="listing-meta">
              <time class="listing-date">Publiée le 27/09/24 20h35</time>
              <p class="listing-price">550€</p>
            </div>
          </div>
        </article>
      </div>
    </section>
  </main>
</div>
        <?php
    }
}
?>