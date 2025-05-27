$(document).ready(function() {
    $('#career-apply-form').on('submit', function(e) {
        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            url: 'submit_career_form.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            beforeSend: function() {
                $('.submit').attr('disabled', true).text('Submitting...');
                $('.error-text').text(''); 
                $('.form-control, select, textarea, input[type="file"]').removeClass('is-invalid');
            },
            success: function(response) {
                $('.submit').attr('disabled', false).text('Apply');

                if (response.status == 'error') {
                    let firstErrorField = null;
                    
                    $.each(response.errors, function(field, message) {
                        var fieldId = 'form_' + field; // create matching id

                        $('#' + fieldId)
                            .addClass('is-invalid')
                            .closest('.form-group')
                            .find('.error-text')
                            .text(message);

                        // Save first error field to scroll
                        if (!firstErrorField) {
                            firstErrorField = $('#' + fieldId);
                        }
                    });

                    if (firstErrorField) {
                        $('html, body').animate({
                            scrollTop: firstErrorField.offset().top - 100
                        }, 500);
                    }

                } else if (response.status == 'success') {
                    Swal.fire({
                        title: 'Success',
                        text: response.message,
                        icon: 'success',
                        didOpen: () => {
                            $('.swal2-container').appendTo('body');
                        }
                    });
                    $('#career-apply-form')[0].reset();
                    $('.file-name').text('No file chosen');
                    $('#PackagingConsultant').modal('hide');
                }
            },
            error: function(xhr, status, error) {
                $('.submit').attr('disabled', false).text('Apply');
                Swal.fire({
                    title: 'Error',
                    text: 'Something went wrong. Please try again!',
                    icon: 'error',
                    didOpen: () => {
                        $('.swal2-container').appendTo('body');
                    }
                });
            }
        });
    });


    // Show selected file name
    $('#form_resume').on('change', function() {
        var fileName = $(this).val().split('\\').pop();
        $('.file-name').text(fileName);
    });
});

function validateInput(input) {
        input.value = input.value.replace(/[^a-zA-Z\s]/g, ''); 
}