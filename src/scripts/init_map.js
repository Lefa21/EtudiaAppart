document.addEventListener("DOMContentLoaded", function () {
  initMap();
});

function initMap() {
  const defaultLocation = { lat: 48.8566, lng: 2.3522 };

  const map = new google.maps.Map(document.getElementById("google-map"), {
    zoom: 12,
    center: defaultLocation,
  });

  const adDataElement = document.getElementById("adData");
  if (!adDataElement) {
    console.error("L'élément adData n'a pas été trouvé dans le DOM.");
    return;
  }

  const adData = JSON.parse(adDataElement.textContent);
  console.log(adData);

  if (!adData || adData.length === 0) {
    console.error("Aucune donnée à afficher sur la carte.");
    return;
  }

  const geocoder = new google.maps.Geocoder();

  adData.forEach((ad) => {
    const city = ad.city;
    const zipCode = ad.zipCode;
    const country = ad.country;

    if (city && zipCode && country) {
      const address = `${city}, ${zipCode}, ${country}`;
      console.log(address);

      geocoder.geocode({ address: address }, (results, status) => {
        if (status === google.maps.GeocoderStatus.OK) {
          const location = results[0].geometry.location;
          new google.maps.Marker({
            position: location,
            map: map,
            title: ad.ad_title,
          });
        } else {
          console.error(
            `Erreur de géocodage pour l'adresse : ${address}, statut : ${status}`,
          );
        }
      });
    } else {
      console.warn(`Données manquantes pour l'annonce : ${JSON.stringify(ad)}`);
    }
  });
}
