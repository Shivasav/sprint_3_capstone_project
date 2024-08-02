  // Validation functions
  function isValidCustomerCode(code) {
    const prefix = 'CU';
    const expectedLength = 10 - prefix.length;
    const regex = new RegExp(`^${prefix}[a-zA-Z0-9]{${expectedLength}}$`);
    return regex.test(code);
}

function isValidDriverCode(code) {
    const prefix = 'DR';
    const expectedLength = 10 - prefix.length;
    const regex = new RegExp(`^${prefix}[a-zA-Z0-9]{${expectedLength}}$`);
    return regex.test(code);
}
$(document).ready(function () {
    $('#searchButton').click(function (event) {
        event.preventDefault(); // Prevent default button behavior

        const searchInput = $('#searchInput').val().trim();

        if (searchInput === '') {
            Swal.fire({
                icon: 'error',
                title: 'Invalid Input',
                text: 'Please enter a code.',
            });
            return;
        }

        // Check if the input is a valid customer or driver code
        if (isValidCustomerCode(searchInput) || isValidDriverCode(searchInput)) {
            // Send an AJAX request to the server to check if the code exists
            $.ajax({
                type: 'POST',
                url:  base_url + '/validatethecode', // Replace with your server endpoint
                data: { code: searchInput },
                dataType: 'json',
                success: function (data) {
                    if (data.status) {
                        // The code exists
                        Swal.fire({
                            icon: 'success',
                            title: 'Code Found',
                            text: data.msg
                          }).then(() => {
                            // Redirect to the specified URL
                            window.location.href = data.redirect;
                        });
                    } else {
                        // The code does not exist
                        Swal.fire({
                            icon: 'error',
                            title: 'Code Not Found',
                            text: data.msg
                        });
                    }
                },
                error: function () {
                    // Handle AJAX error
                    Swal.fire({
                        icon: 'error',
                        title: 'Server Error',
                        text: 'An error occurred while checking the code.',
                    });
                }
            });
        } else {
            // Display an error if the code is not valid
            Swal.fire({
                icon: 'error',
                title: 'Invalid Code',
                text: 'Please enter a valid customer or driver code.',
            });
        }
    });
});


$(document).ready(function() {
    // Prevent the default form submission
    $("#activation-form").submit(function(e) {
        e.preventDefault();

        // Get the activation code from the input field
        var activationCode = $("#active-code").val();

        // Send the data to the server using AJAX
        $.ajax({
            type: "POST",
            url: base_url + "/verification", // Replace with the actual URL of your controller
            data: { activation_code: activationCode },
            success: function(response) {
                 // Check if the response indicates success
                 if (response.success) {
                    // Display a success message with SweetAlert2
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text:  response.message,
                    }).then(() => {
                        // Redirect to the specified URL
                        window.location.href = base_url + 'find';
                    }); 

                } else {
                    // Display a custom error message from the server
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message,
                    });
                }
            },
            error: function(xhr, status, error) {
                  // Display a generic error message with SweetAlert2
                  Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred while processing your request.',
                });
            }
        });
    });
});