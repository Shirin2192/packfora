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

$(document).ready(function () {
        $('#contact-us-form').on('submit', function (e) {
        e.preventDefault(); // Prevent default form submission

        // Clear previous error messages
        $('.error-message').remove();

        $.ajax({
            type: 'POST',
            url: 'contact-save.php',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success'
                    }).then(() => {
                        $('#contact-us-form')[0].reset(); // Reset form
                    });
                } else if (response.errors) {
                    $.each(response.errors, function (field, message) {
                        const fieldElement = $('[name="' + field + '"]');
                        if (fieldElement.length) {
                            const $error = $('<div class="error-message" style="color:red; font-size: 13px; margin-top: 4px;">' + message + '</div>');
                            fieldElement.after($error);

                            // Auto-hide after 5 seconds
                            setTimeout(function () {
                                $error.fadeOut(300, function () {
                                    $(this).remove();
                                });
                            }, 5000);
                        }
                    });
                }
            },
            error: function () {
                console.error('AJAX error occurred');
            }
        });
    });
});

function validateInput(input) {
    input.value = input.value.replace(/[^a-zA-Z\s]/g, ''); 
}