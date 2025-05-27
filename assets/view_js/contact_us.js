const dropdown = document.getElementById("inquiryDropdown");
const header = document.getElementById("selectedText");
const options = dropdown.querySelectorAll("input[type='radio']");

header.addEventListener("click", () => {
    dropdown.classList.toggle("active");
});

options.forEach(option => {
    option.addEventListener("change", () => {
        header.textContent = option.closest("label").innerText.trim();
        dropdown.classList.remove("active");
    });
});

document.addEventListener("click", function(e) {
    if (!dropdown.contains(e.target)) {
        dropdown.classList.remove("active");
    }
});

$(document).ready(function() {
    $('#contact-us-form').on('submit', function(e) {
        e.preventDefault(); // Stop form from submitting normally

        $.ajax({
            type: 'POST',
            url: 'contact-save.php',
            data: $(this).serialize(),
            success: function(response) {
                if (response.includes('Thank you for contacting us!')) {
                    Swal.fire({
                        title: 'Success!',
                        text: response,
                        icon: 'success'
                    }).then(() => {
                        $('#contact-us-form')[0]
                    .reset(); // Reset form after success
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response,
                        icon: 'error'
                    });
                }
            },
            error: function() {
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