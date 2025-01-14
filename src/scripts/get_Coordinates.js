// Fonction pour récupérer les coordonnées géographiques (latitude, longitude) via l'API Google Maps
function getCoordinates() {
  // Récupérer les valeurs des champs de l'utilisateur
  const city = document.querySelector('input[name="ville_form"]').value;
  const postalCode = document.querySelector('input[name="cp_form"]').value;
  const region = document.querySelector('input[name="region_form"]').value;

  // Vérifier si les champs sont remplis
  if (city && postalCode && region) {
    const address = `${city}, ${postalCode}, ${region}`;

    // Initialiser le géocodeur de Google Maps
    const geocoder = new google.maps.Geocoder();

    // Utiliser le géocodeur pour obtenir les coordonnées de l'adresse
    geocoder.geocode({ 'address': address }, function(results, status) {
      if (status === google.maps.GeocoderStatus.OK) {
        // Récupérer la latitude et la longitude de la première réponse
        const lat = results[0].geometry.location.lat();
        const lon = results[0].geometry.location.lng();

        // Afficher les résultats dans la console (vous pouvez les utiliser comme bon vous semble)
        console.log(`Latitude: ${lat}, Longitude: ${lon}`);

        // Facultatif : vous pouvez aussi remplir des champs cachés ou les afficher sur votre page
        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lon;

        // Vous pouvez aussi afficher ces valeurs à l'utilisateur si nécessaire
        alert(`Coordonnées : Latitude: ${lat}, Longitude: ${lon}`);
      } else {
        alert('Aucune adresse trouvée. Vérifiez les informations saisies.');
      }
    });
  } else {
    alert('Veuillez remplir tous les champs pour récupérer les coordonnées.');
  }
}

// Ajouter un événement de soumission ou de changement sur le bouton pour déclencher la fonction
document.getElementById('submit_button').addEventListener('click', function(e) {
  e.preventDefault();
  getCoordinates();
});
