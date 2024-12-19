 // Attendre que le DOM soit complètement chargé
 document.addEventListener('DOMContentLoaded', function () {
    // Initialiser la carte dans le conteneur avec l'ID 'map'
    const map = L.map('map').setView([48.8566, 2.3522], 13); // Coordonnées de Paris

    // Ajouter les tuiles OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Ajouter un marqueur (facultatif)
    const marker = L.marker([48.8566, 2.3522]).addTo(map);
    marker.bindPopup("Bienvenue à Paris !").openPopup();
});
