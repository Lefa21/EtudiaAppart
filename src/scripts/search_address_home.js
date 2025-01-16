function initializeAutocomplete() {
  const locationInput = document.getElementById('location-input');

  const autocomplete = new google.maps.places.Autocomplete(locationInput, {
    types: ['geocode'],
    componentRestrictions: { country: 'fr' }, 
  });

 
  autocomplete.addListener('place_changed', function () {
    const place = autocomplete.getPlace();

    if (!place.address_components) {
      alert("Adresse invalide ! Veuillez réessayer.");
      return;
    }

    let city = '';
    let addressLine = '';
    let country = '';
    let postalCode = '';
    let latitude = '';
    let longitude = '';

    place.address_components.forEach((component) => {
      if (component.types.includes('locality')) {
        city = component.long_name; 
      }
      if (component.types.includes('route')) {
        addressLine = component.long_name;
      }
      if (component.types.includes('country')) {
        country = component.long_name; 
      }
    });

    latitude = place.geometry.location.lat();
    longitude = place.geometry.location.lng();

    document.getElementById('city').value = city;
    document.getElementById('address_line').value = addressLine;
    document.getElementById('country').value = country;
    document.getElementById('latitude').value = latitude;
    document.getElementById('longitude').value = longitude;
    
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
              
              document.getElementById('postal_code').value = postalCode;
          } else {
              console.log('Aucun résultat trouvé.');
          }
      })
      .catch(error => {
          console.error('Erreur:', error);
      });
}

window.onload = initializeAutocomplete;