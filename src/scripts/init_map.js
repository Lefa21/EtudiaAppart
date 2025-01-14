function initMap() {
    // Coordonnées de départ (exemple : Paris)
    const location = { lat: 48.8566, lng: 2.3522 };

    // Initialisation de la carte
    const map = new google.maps.Map(document.getElementById("google-map"), {
      zoom: 12, // Niveau de zoom
      center: location, // Centre de la carte
    });

    // Ajout d'un marqueur
    new google.maps.Marker({
      position: location,
      map: map,
    });
  }

  // Charger la carte immédiatement après le chargement de la page
  window.onload = initMap;
