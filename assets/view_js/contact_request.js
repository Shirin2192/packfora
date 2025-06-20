
function validateInput(input) {
    input.value = input.value.replace(/[^a-zA-Z\s]/g, ''); 
}

$(".NumberOnly").on("keydown", function (e) {
      // Allow: Backspace, Tab, Delete, Arrow keys
      if ($.inArray(e.keyCode, [8, 9, 46, 37, 39]) !== -1) {
        return;
      }

      // Allow: + key (Shift + =) → key = '+'
      if (e.key === "+" || (e.shiftKey && e.keyCode === 187)) {
        return;
      }

      // Allow: number keys (0–9)
      if ((e.keyCode >= 48 && e.keyCode <= 57) || // top row
          (e.keyCode >= 96 && e.keyCode <= 105)) { // numpad
        return;
      }

      // Prevent all other keys
      e.preventDefault();
    });

$(document).ready(function () {
    $('#contact_request').on('submit', function (e) {
        e.preventDefault();
        // Clear previous error messages
        $('.error-message').remove();

        $.ajax({
            type: 'POST',
            url: 'contact-request.php',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // Show SweetAlert only for success
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success'
                    }).then(() => {
                        $('#contact_request')[0].reset();
                    });
                } else if (response.errors) {
                    const fieldNames = ['name', 'email', 'subject', 'services', 'message'];

                    // Show field-level errors only
                    $.each(response.errors, function (fieldName, errorMessage) {
                        if (fieldNames.includes(fieldName)) {
                            const field = $('[name="' + fieldName + '"]');
                            if (field.length) {
                                field.after('<div class="error-message" style="color:red; font-size: 13px; margin-top: 4px;">' + errorMessage + '</div>');
                            }
                        }
                    });
                }
            },
            error: function () {
                // Optional: You may silently fail or show a console error
                console.error('Server error occurred');
            }
        });
    });
});

