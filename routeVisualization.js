// routeVisualization.js
let map;

function initializeMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: 23.8103, lng: 90.4125 }, // Dhaka's coordinates
        zoom: 12,
    });
}

document.getElementById("visualize-route").addEventListener("click", () => {
    const source = document.getElementById("source").value;
    const destination = document.getElementById("destination").value;

    if (!source || !destination) {
        alert("Please enter both starting location and destination.");
        return;
    }

    const directionsService = new google.maps.DirectionsService();
    const directionsRenderer = new google.maps.DirectionsRenderer();

    directionsRenderer.setMap(map);

    const request = {
        origin: source,
        destination: destination,
        travelMode: google.maps.TravelMode.DRIVING, // Change mode as needed
    };

    directionsService.route(request, (result, status) => {
        if (status === google.maps.DirectionsStatus.OK) {
            directionsRenderer.setDirections(result);
        } else {
            alert("Could not fetch route: " + status);
        }
    });
});

// Initialize the map on page load
window.onload = initializeMap;
