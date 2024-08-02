$(document).ready(function() { 

    const userDataJSON = localStorage.getItem('userData');
    if (userDataJSON) {
        // Parse the JSON string back into an object
        const userData = JSON.parse(userDataJSON);
        document.getElementById('name-input').value = userData.name;
        document.getElementById('email-input').value = userData.email;
        document.getElementById('mobile-input').value = userData.mobile;
    }


     // Disable dates in the past (before today)
    flatpickr('#date-input', {
        disable: [
            function(date) {
                return (date < new Date().setHours(0, 0, 0, 0)) ? true : false;
            }
        ]
    });

// Function to extract form data
function extractFormData(formId) {

    return {
        type: $(formId + ' #type').val(),
        departure: $(formId + ' #departure-input').val(),
        drop: $(formId + ' #drop-input').val(),
        date: $(formId + ' #date-input').val(),
        time: $(formId + ' #time-input').val(),
        gender: $(formId + ' input[name="btnradio"]:checked').val(),
        availableSeats: $(formId + ' #available-seats-input').val(),
        fare: $(formId + ' #fare-input').val(),
        name: $(formId + ' #name-input').val(),
        email: $(formId + ' #email-input').val(),
        mobile: $(formId + ' #mobile-input').val(),
        desc: $(formId + ' #description-input').val(),
        departure_c: $(formId + ' #departure-city-input').val(),
        departure_p: $(formId + ' #departure-postal-input').val(),
        departure_pv: $(formId + ' #departure-province-input').val(),
        drop_c: $(formId + ' #drop-city-input').val(),
        drop_p: $(formId + ' #drop-postal-input').val(),
        drop_pv: $(formId + ' #drop-province-input').val(),
        distance: $('#distance-badge-id #distance-span').text(),
        eta: $('#duration-badge-id #duration-span').text()
    };
}

// Function to perform form validation
function validateForm(formData, formId) {
    if ($.trim(formData.departure) === '') {
        displayError('Please select departure location.', 'Please select departure location.');
        return false;
    } else if ($.trim(formData.drop) === '') {
        displayError('Please select drop off location.', 'Please select drop off location.');
        return false;
    } else if ($.trim(formData.date) === '' || isPastDate(formData.date)) {
        displayError('Please select a valid future date.', 'Please select a valid future date.');
        return false;
    } else if ($.trim(formData.time) === '') {
        displayError('Please select a valid time.', 'Please select a valid time.');
        return false;
    } else if ($.trim(formData.availableSeats) === '' || isNaN(formData.availableSeats) || !Number.isInteger(Number(formData.availableSeats))) {
        displayError('Please enter a valid number of available seats.', 'Please enter a valid number of available seats.');
        return false;
    } else if (formId == 'post-trip' && ($.trim(formData.fare) === '' || isNaN(formData.fare))) {
        displayError('Please enter a valid fare amount.', 'Please enter a valid fare amount.');
        return false;
    } else if ($.trim(formData.name) === '') {
        displayError('Please enter a Full name.', 'Please enter a Full name.');
        return false;
    } else if ($.trim(formData.email) === '' || !validateEmail(formData.email)) {
        displayError('Please enter a valid email address.', 'Please enter a valid email address, we only allow (gmail.com, yahoo.com, outlook.com, hotmail.com, icloud.com, mail.com)');
        return false;
    } else if ($.trim(formData.mobile) === '' || !validateMobile(formData.mobile)) {
        displayError('Please enter a valid mobile number.', 'Please enter a valid mobile number.');
        return false;
    }
    return true;
}

// Function to handle form submission
function handleFormSubmission(formId) {
    $(formId).submit(function (event) {
        event.preventDefault();

        // Extract form data
        const formData = extractFormData(formId);

         // Store the data
        storeUserDataLocally(formData.name, formData.email, formData.mobile);

        // Perform form field validation
        if (validateForm(formData, formId)) {
            // All validations passed, proceed with sending data to the server
            $.ajax({
                type: 'POST',
                url: base_url + 'save-trip',
                data: formData,
                success: function (response) {
                    // Handle the success response from the server
                    if(response.success){
                        $(formId)[0].reset();
                        displaySuccess('Success!', response.message, response.redirect);
                    }else{
                        displayError('Oops...',  response.message);
                    }
                    
                },
                error: function (error) {
                    // Handle the error response from the server
                    displayError('Oops...', 'An error occurred while submitting the form.');
                }
            });
        }
    });
}


   // Bind click event for the "Post Trip" button once
    $('#post-trip-button').one('click', function (event) {
        handleFormSubmission('#post-trip');
    });

    // Bind click event for the "Request" button once
    $('#request-button').one('click', function (event) {
        handleFormSubmission('#request');
    });

    // Function to display a SweetAlert error message
    function displayError(title, text) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: text,
        });
    }

   // Function to display a SweetAlert success message
    function displaySuccess(title, text, url) {
        Swal.fire({
            icon: 'success',
            title: title,
            text: text,
        }).then(() => {
            // Redirect to the specified URL
            window.location.href = url;
        });

    }


    function validateEmail(email) {
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const allowedDomains = ['gmail.com', 'yahoo.com', 'outlook.com', 'hotmail.com', 'icloud.com', 'mail.com']; // Add your reputed domains here
    
        // Split the email address into parts (local part and domain)
        const [localPart, domain] = email.split('@');
    
        // Check if the email format is valid and the domain is in the allowed list
        return emailPattern.test(email) && allowedDomains.includes(domain);
    }

    // Function to validate mobile number format
    function validateMobile(mobile) {
        const mobilePattern = /^\d{10}$/;
        return mobilePattern.test(mobile);
    }

   // Function to check if a date is in the past
    function isPastDate(dateString) {
        const parts = dateString.split('-'); // Split the date string into parts
        const year = parseInt(parts[0], 10); // Get year from the first part
        const month = parseInt(parts[1], 10) - 1; // Get month from the second part (subtract 1 as months are zero-indexed)
        const day = parseInt(parts[2], 10); // Get day from the third part

        const selectedDate = new Date(year, month, day); // Construct the Date object
        const today = new Date();
        // Set hours, minutes, seconds, and milliseconds to 0 for accurate comparison
        today.setHours(0, 0, 0, 0);
        return selectedDate < today;
    }


    // Store name, email, and mobile in localStorage
    function storeUserDataLocally(name, email, mobile) {
        const userData = {
            name: name,
            email: email,
            mobile: mobile,
        };

        // Convert userData object to a JSON string
        const userDataJSON = JSON.stringify(userData);

        // Store the JSON string in localStorage
        localStorage.setItem('userData', userDataJSON);
}

});



