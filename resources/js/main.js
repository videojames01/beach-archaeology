import L from 'leaflet';
import 'leaflet/dist/leaflet.css';

document.addEventListener('DOMContentLoaded', () => {
    // Hamburger (keep if your layout uses it)
    const hamburger = document.querySelector('.hamburger');
    const nav = document.querySelector('nav');
    if (hamburger && nav) {
        hamburger.addEventListener('click', () => {
            nav.classList.toggle('active');
        });
    }

    // Toggle for expert info
    const toggle = document.getElementById('toggle-extra');
    const extra = document.getElementById('extra-info');
    if (toggle && extra) {
        toggle.addEventListener('change', function () {
            extra.style.display = this.checked ? 'block' : 'none';
        });
    }

    // Leaflet map logic
    const mapElement = document.getElementById('map');
    const gpsInput = document.getElementById('gps_location');
    const gpsDisplay = document.getElementById('gps_display');

    if (mapElement && gpsInput && gpsDisplay) {
        let map, marker;

        function updateLocation(lat, lng) {
            gpsInput.value = `${lat},${lng}`;
            gpsDisplay.innerText = `Selected: ${lat.toFixed(5)}, ${lng.toFixed(5)}`;
            console.log("GPS updated to:", lat, lng);
        }

        function initMap(lat = 52.379189, lng = 4.90093) {
            map = L.map(mapElement).setView([lat, lng], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            marker = L.marker([lat, lng], { draggable: true }).addTo(map);

            updateLocation(lat, lng);

            marker.on('dragend', function () {
                const pos = marker.getLatLng();
                updateLocation(pos.lat, pos.lng);
            });
        }

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (pos) => initMap(pos.coords.latitude, pos.coords.longitude),
                (err) => {
                    console.warn("Geolocation denied:", err.message);
                    initMap(); // fallback
                }
            );
        } else {
            console.warn("Geolocation not supported");
            initMap();
        }
    }
});
