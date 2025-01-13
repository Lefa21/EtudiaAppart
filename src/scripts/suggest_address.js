function initializeAutocomplete() {
    const locationInput = document.getElementById('location-input');
  
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
        if (component.types.includes('postal_code')) {
          postalCode = component.long_name; // Code postal
        }
      });
  
      // Pré-remplir les champs cachés pour le backend
      document.getElementById('city').value = city;
      document.getElementById('address_line').value = addressLine;
      document.getElementById('country').value = country;
      document.getElementById('postal_code').value = postalCode;
  
      // Optionnel : montrer le code postal à l'utilisateur (si désiré)
      const fullAddress = `${addressLine}, ${city}, ${postalCode}, ${country}`;
      locationInput.value = fullAddress;
  
      console.log(`Ville : ${city}, Rue : ${addressLine}, Pays : ${country}, Code postal : ${postalCode}`);
    });
  }
  
  window.onload = initializeAutocomplete;
  