
// Initialize variables to store city information
let pickupCity = '';
let dropCity = '';

// Initialize Google Places Autocomplete for pickup and drop inputs
function initAutocomplete() {
    const pickupInput = document.getElementById('pickup-input');
    const dropInput = document.getElementById('drop-input');

    const autocompleteOptions = {
        types: ['geocode'],
        componentRestrictions: { country: 'CA' } // Restrict to Canada (CA)
    };

    const pickupAutocomplete = new google.maps.places.Autocomplete(pickupInput, autocompleteOptions);
    const dropAutocomplete = new google.maps.places.Autocomplete(dropInput, autocompleteOptions);

    // Add event listeners to handle place selection
    pickupAutocomplete.addListener('place_changed', function () {
        handlePlaceSelect(pickupAutocomplete, 'pickup');
    });

    dropAutocomplete.addListener('place_changed', function () {
        handlePlaceSelect(dropAutocomplete, 'drop');
    });
}

function handlePlaceSelect(autocomplete, locationType) {
    const inputField = locationType === 'pickup' ? 'pickup-input' : 'drop-input';
    const inputValue = document.getElementById(inputField).value.trim();

    if (inputValue === '') {
        Swal.fire({
            icon: 'error',
            title: 'Input Required',
            text: `Please enter a valid address for ${locationType}.`,
        });
        return;
    }

    const place = autocomplete.getPlace();

    if (!place.geometry || !place.address_components) {
        Swal.fire({
            icon: 'error',
            title: 'Invalid Address',
            text: `Please enter a valid address for ${locationType}.`,
        });
        return;
    }

    const addressComponents = place.address_components;
    let city = '';
    let cityFound = false;

    for (const component of addressComponents) {
        if (component.types.includes('locality')) {
            city = component.long_name;
            cityFound = true;
            break; // Exit the loop as soon as the city is found
        }
    }

    if (!cityFound) {
        Swal.fire({
            icon: 'error',
            title: 'City Missing',
            text: `Please select a city for ${locationType}.`,
        });
        return;
    }

    // Store the city information in the appropriate variable
    if (locationType === 'pickup') {
        pickupCity = city;
    } else if (locationType === 'drop') {
        dropCity = city;
    }
}

$(document).ready(function () {


    // Find the button element by its ID
    const swapButton = $('#swap-button');

    // Add a click event listener to the button
    swapButton.click(function () {
        // Get the values of the pickup and drop input fields
        const pickupValue = $('#pickup-input').val();
        const dropValue = $('#drop-input').val();

        // Swap the values between the pickup and drop input fields
        $('#pickup-input').val(dropValue);
        $('#drop-input').val(pickupValue);
    });

    // Initialize Google Places Autocomplete
    initAutocomplete();


    // Disable dates in the past (before today)
    flatpickr('#date-input', {
        dateFormat: "Y-m-d",
        disable: [
            function (date) {
                return (date < new Date().setHours(0, 0, 0, 0)) ? true : false;
            }
        ]
    });

    $('#search-btn').click(function (event) {
        event.preventDefault(); // Prevent default form submission

        var pickup = $('#pickup-input').val();
        var drop = $('#drop-input').val();
        var date = $('#date-input').val();
        var time = $('#time-input').val();

        // Check if both pickup and drop fields are empty
        if (pickup == '' || drop == '') {
            // Show a SweetAlert error message
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                text: 'Please fill in both pickup and drop fields.',
            });
            return; // Prevent further execution
        }
     

        // Append the desired route or path to the current URL
        const submitURL = base_url + 'find';

        // Construct the URL with parameters
        var redirectUrl = submitURL + `?pick=${pickupCity}&drop=${dropCity}`;

        if (date) {
            // Append date to the redirect URL
            redirectUrl += `&date=${date}`;
        }
        if (time) {
            // Append time to the redirect URL
            redirectUrl += `&time=${time}`;
        }


        $.ajax({
            complete: function () {
                // This block will execute regardless of success or error
                // Redirect to the destination page
                window.location.href = redirectUrl;// Redirect to the same page for this example
            }

        });
    });
});