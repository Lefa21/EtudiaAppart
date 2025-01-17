<style>
  .not-found-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 60vh;
  }

  .not-found-container h1 {
    font-size: 2rem;
    color: #333;
    margin-bottom: 10px;
  }

  .not-found-container p {
    font-size: 1.2rem;
    color: #666;
    margin-bottom: 20px;
  }

  .redirect-button {
    font-size: 1rem;
    padding: 10px 20px;
    color: #fff;
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
  }

  .redirect-button:hover {
    background-color: #0056b3;
  }
</style>
<div class="not-found-container">
  <h1>Aucune annonce n'a été trouvée</h1>
  <p>Il semble que l'annonce que vous cherchez n'existe pas ou a été supprimée.</p>
  <button class="redirect-button" onclick="window.location.href='index.php?module=ad_search'">
    Retourner à la recherche
  </button>
</div>