
 document.addEventListener('DOMContentLoaded', function () {
  
    const map = L.map('map').setView([48.8566, 2.3522], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    const marker = L.marker([48.8566, 2.3522]).addTo(map);
    marker.bindPopup("Bienvenue à Paris !").openPopup();
});


