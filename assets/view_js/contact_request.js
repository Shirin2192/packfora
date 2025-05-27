$(document).ready(function () {
    $('#contact-request').on('submit', function (e) {
        e.preventDefault(); // Stop form from submitting normally

        $.ajax({
            type: 'POST',
            url: 'contact-request.php',  // PHP script that handles the form submission
            data: $(this).serialize(), // Serialize the form data for submission
            success: function (response) {
                if (response.includes('Thank you for contacting us! We have received your request.')) {
                    Swal.fire({
                        title: 'Success!',
                        text: response,
                        icon: 'success'
                    }).then(() => {
                        $('#contact-request')[0].reset(); // Reset form after success
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response,
                        icon: 'error'
                    });
                }
            },
            error: function () {
                Swal.fire({
                    title: 'Error!',
                    text: 'An unexpected error occurred. Please try again later.',
                    icon: 'error'
                });
            }
        });
    });

});
function validateInput(input) {
    input.value = input.value.replace(/[^a-zA-Z\s]/g, ''); 
}