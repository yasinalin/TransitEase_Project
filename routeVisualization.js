document.getElementById("visualize-route").addEventListener("click", async () => {
    const source = document.getElementById("source").value;
    const destination = document.getElementById("destination").value;

    if (!source || !destination) {
        alert("Please enter both starting location and destination.");
        return;
    }

    // Fetch station coordinates for better visualization
    try {
        const response = await fetch(`get_station_coords.php?source=${source}&destination=${destination}`);
        const data = await response.json();

        const directionsService = new google.maps.DirectionsService();
        const directionsRenderer = new google.maps.DirectionsRenderer();

        directionsRenderer.setMap(map);

        const request = {
            origin: new google.maps.LatLng(data.source.lat, data.source.lng),
            destination: new google.maps.LatLng(data.destination.lat, data.destination.lng),
            travelMode: google.maps.TravelMode.DRIVING,
        };

        directionsService.route(request, (result, status) => {
            if (status === google.maps.DirectionsStatus.OK) {
                directionsRenderer.setDirections(result);
            } else {
                alert("Could not fetch route: " + status);
            }
        });
    } catch (error) {
        console.error("Error fetching station coordinates:", error);
    }
});
