
/*
function initializeAutocomplete() {
    const locationInput = document.getElementById('location-ad_search');
  
    // Initialiser l'autocomplete
    const autocomplete = new google.maps.places.Autocomplete(locationInput, {
      types: ['geocode'], // Limiter aux adresses géocodées
      componentRestrictions: { country: 'fr' }, // Limiter aux adresses en France
    });
  
    // Quand une adresse est sélectionnée
    autocomplete.addListener('place_changed', function () {
      const place = autocomplete.getPlace();
  
      if (!place.address_components) {
        alert("Adresse invalide ! Veuillez réessayer.");
        return;
      }
  
      // Extraire les composants nécessaires
      let city = '';
      let addressLine = '';
      let country = '';
      let postalCode = '';
      let latitude = '';
      let longitude = '';
  
      place.address_components.forEach((component) => {
        if (component.types.includes('locality')) {
          city = component.long_name; // Ville
        }
        if (component.types.includes('route')) {
          addressLine = component.long_name; // Rue
        }
        if (component.types.includes('country')) {
          country = component.long_name; // Pays
        }
      });
  
      // Récupérer la latitude et la longitude
      latitude = place.geometry.location.lat();
      longitude = place.geometry.location.lng();
  
      // Pré-remplir les champs cachés pour le backend
      document.getElementById('city').value = city;
      document.getElementById('address_line').value = addressLine;
      document.getElementById('country').value = country;
      document.getElementById('latitude').value = latitude;
      document.getElementById('longitude').value = longitude;
      
  
      // Optionnel : montrer l'adresse complète à l'utilisateur (y compris le code postal)
      const fullAddress = `${addressLine}, ${postalCode} ${city}, ${country}`;
      locationInput.value = fullAddress;
  
      console.log(`Ville : ${city}, Rue : ${addressLine}, Pays : ${country}, Latitude : ${latitude}, Longitude : ${longitude}`);
      getPostalCodeNominatim(city, country, addressLine);
    });
  }
  
  function getPostalCodeNominatim(city, country, address) {
    const query = `${address}, ${city}, ${country}`;
    const url = `https://nominatim.openstreetmap.org/search?q=${encodeURIComponent(query)}&format=json&addressdetails=1&limit=1`;
  
    fetch(url)
        .then(response => response.json())
        .then(data => {
            if (data.length > 0) {
                const result = data[0];
                const postalCode = result.address.postcode || 'Code postal non trouvé';
                console.log('Code postal:', postalCode);
  
                // Remplir les champs correspondants ici
                document.getElementById('postal_code').value = postalCode;
            } else {
                console.log('Aucun résultat trouvé.');
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
        });
  }
  
  //window.onload = initializeAutocomplete;

  window.addEventListener('load', () => {
    initializeAutocomplete();
});
*/