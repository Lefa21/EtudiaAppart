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
  if (!adDataElement || !adDataElement.textContent.trim()) {
    console.error("L'élément adData est vide ou introuvable.");
    return;
  }

  let adData;
  try {
    adData = JSON.parse(adDataElement.textContent);
  } catch (error) {
    console.error("Erreur lors du parsing de adData : ", error.message);
    return;
  }

  if (!adData || adData.length === 0) {
    console.warn("Aucune donnée d'annonce disponible.");
    return;
  }

  console.log(adData);

  const geocoder = new google.maps.Geocoder(); 
  const bluePin = {
    path: "M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5S13.38 11.5 12 11.5z",
    fillColor: "#041a8f",
    fillOpacity: 1,
    strokeWeight: 0,
    scale: 2,
    anchor: new google.maps.Point(12, 24), 
  };

  adData.forEach((ad) => {
    const city = ad.city;
    const zipCode = ad.zipCode;
    const country = ad.country;

    if (city && zipCode && country) {
      const address = `${city}, ${zipCode}, ${country}`;
      console.log(`Géocodage pour : ${address}`);

      geocoder.geocode({ address: address }, (results, status) => {
        if (status === google.maps.GeocoderStatus.OK) {
          const location = results[0].geometry.location;

          // Création du marqueur avec l'icône personnalisée
          const marker = new google.maps.Marker({
            position: location,
            map: map,
            title: ad.ad_title,
            icon: bluePin,
          });

          // Création de la fenêtre d'information
          const infoWindow = new google.maps.InfoWindow({
            content: `
              <div onclick="redirectTo(this)">
              <span class="annonceId" hidden><${ad.id_ad}></span>
                <h3>${ad.ad_title}</h3>
                <p>${ad.city}, ${ad.zipCode}</p>
                <p>${ad.rent_price}€</p>
              </div>
            `,
          });

          // Affichage de la fenêtre d'information au clic sur le marqueur
          marker.addListener("click", () => {
            infoWindow.open(map, marker);
          });
        } else {
          console.error(
            `Erreur de géocodage pour l'adresse : ${address}, statut : ${status}`
          );
        }
      });
    } else {
      console.warn(`Données manquantes pour l'annonce : ${JSON.stringify(ad)}`);
    }
  });
}
