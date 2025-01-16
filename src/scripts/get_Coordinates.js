function getCoordinates() {

  const city = document.querySelector('input[name="city_pins"]').value;
  const zipCode = document.querySelector('input[name="zipCode_pins"]').value;
  const country = document.querySelector('input[name="country_pins"]').value;


  if (city && zipCode && country) {
    const address = `${city}, ${zipCode}, ${country}`;

    const geocoder = new google.maps.Geocoder();

    geocoder.geocode({ 'address': address }, function(results, status) {
      if (status === google.maps.GeocoderStatus.OK) {
        const lat = results[0].geometry.location.lat();
        const lon = results[0].geometry.location.lng();

       
        console.log(`Latitude: ${lat}, Longitude: ${lon}`);

     
        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lon;
      }
    });
  }
}

document.getElementById('submit_button').addEventListener('click', function(e) {
  e.preventDefault();
  getCoordinates();
});
