    let departureAutocomplete, dropAutocomplete;
    let departureLocation, dropLocation;
    let map, directionsService, directionsRenderer;
	let farePerKilometer = 0.25; // Fare rate in dollars per kilometer
	let fixedFareThreshold = 15; // Distance threshold for fixed fare in kilometers
    let fixedFareAmount = 8; // Fixed fare amount in dollars

    function initMap() {
        // Set default coordinates for Brantford, Canada
        const brantfordCoords = { lat: 43.1394, lng: -80.2646 };

        map = new google.maps.Map(document.getElementById('map'), {
            center: brantfordCoords, // Set the default center to Brantford
            zoom: 10
        });

        directionsService = new google.maps.DirectionsService();
        directionsRenderer = new google.maps.DirectionsRenderer();
        directionsRenderer.setMap(map);

        const departureInput = document.getElementById('departure-input');
        const dropInput = document.getElementById('drop-input');

        // Initialize Autocomplete for departure input
        departureAutocomplete = new google.maps.places.Autocomplete(departureInput, {
            componentRestrictions: { country: 'ca' } // Restrict to Canada
        });
        departureAutocomplete.addListener('place_changed', () => {
            geocodePlace(departureAutocomplete.getPlace(), 'departure');
        });

        // Initialize Autocomplete for drop input
        dropAutocomplete = new google.maps.places.Autocomplete(dropInput, {
            componentRestrictions: { country: 'ca' } // Restrict to Canada
        });
        dropAutocomplete.addListener('place_changed', () => {
            geocodePlace(dropAutocomplete.getPlace(), 'drop');
        });

		//default display off
		document.getElementById('distance-badge-id').style.display = 'none';
        document.getElementById('duration-badge-id').style.display = 'none';

		 // Update fare price whenever distance changes
		const distanceSpan = document.getElementById('distance-span');
        const observer = new MutationObserver(updateFarePrice);
        observer.observe(distanceSpan, { characterData: true, childList: true, subtree: true });
    }

    function geocodePlace(place, markerType) {
        if (!place.geometry) {
            return;
        }

        const cityComponent = place.address_components.find(component =>
            component.types.includes('locality')
        );
    
        const postalCodeComponent = place.address_components.find(component =>
            component.types.includes('postal_code')
        );

        const provinceComponent = place.address_components.find(component =>
            component.types.includes('administrative_area_level_1')
        );

        if (!cityComponent) {
            // Show an alert indicating that more information is required
            alert('Please provide a more detailed address, including the city, postal code or province.');
            return;
        }
    
        if (cityComponent || postalCodeComponent || provinceComponent) {
            const city = cityComponent.long_name;
            const areaCode = postalCodeComponent ? postalCodeComponent.short_name : '';
            const provinceCode = provinceComponent ? provinceComponent.short_name : '';

            if (markerType === 'departure') {
                departureLocation = place.geometry.location;
                document.getElementById('departure-city-input').value = city;
                document.getElementById('departure-postal-input').value = areaCode;
                document.getElementById('departure-province-input').value = provinceCode;
            } else {
                dropLocation = place.geometry.location;
                document.getElementById('drop-city-input').value = city;
                document.getElementById('drop-postal-input').value = areaCode;
                document.getElementById('drop-province-input').value = provinceCode;
            }

        if (departureLocation && dropLocation) {
            calculateDistanceAndDisplayRoute(departureLocation, dropLocation);
        }
    }
    //console.log(place.address_components);
 }

    function calculateDistanceAndDisplayRoute(departure, drop) {
        directionsService.route({
            origin: departure,
            destination: drop,
            travelMode: google.maps.TravelMode.DRIVING
        }, (response, status) => {
            if (status === 'OK') {
                directionsRenderer.setDirections(response);
                const route = response.routes[0];
                const distanceText = route.legs[0].distance.text;
                const durationText = route.legs[0].duration.text;
                document.getElementById('distance-badge-id').style.display = 'inline-block';
                document.getElementById('duration-badge-id').style.display = 'inline-block';
                document.getElementById('distance-span').textContent = distanceText;
                document.getElementById('duration-span').textContent = durationText;
            } else {
                alert('Error calculating distance or displaying route.');
            }
        });
    }

	 // Function to calculate fare price based on distance
	 function calculateFarePrice(distanceInKm) {
        if (distanceInKm <= fixedFareThreshold) {
            return fixedFareAmount.toFixed(2);
        } else {
            return (distanceInKm * farePerKilometer).toFixed(2);
        }
    }

	function updateFarePrice(mutationsList) {
        const distanceSpan = document.getElementById('distance-span');
        const distanceText = distanceSpan.textContent;
        
        // Extract numerical distance value from the text
        const distanceValue = parseFloat(distanceText.replace(/[^\d.]/g, ''));

        // Ensure the extracted distance value is a number
        if (!isNaN(distanceValue)) {
            const farePrice = calculateFarePrice(distanceValue);
			document.getElementById("recomend-fare").innerHTML = "Recommended: $"+ farePrice + "<br>This fare guarantees your journey remains competitive and boosts the likelihood of receiving booking requests from passengers. <a class='text-info' href='#' data-bs-toggle='modal' data-bs-target='#knowMoreModal'>Know More</a>";
            document.getElementById('fare-input').value = farePrice;
        }

		 // Scroll to the map section
		 scrollToMap();
    }

	 // Function to scroll to the map section
	 function scrollToMap() {
        const mapSection = document.getElementById('distance-badge-id');
        if (mapSection) {
            mapSection.scrollIntoView({ behavior: 'smooth', block: 'end' });
        }
    }

    initMap(); 