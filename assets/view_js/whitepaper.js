$('#whitepaper_download').on('submit', function (e) {
  e.preventDefault();
  $('.error').text('');
  $('#form_message').text('');

  $.ajax({
    url: 'submit_whitepaper.php',
    type: 'POST',
    data: $(this).serialize(),
    dataType: 'json',
    success: function (response) {
      if (response.status === 'error') {
        $.each(response.errors, function (key, value) {
          $('#' + key + '_error').text(value);
        });
      } else {
        $('#form_message').html('<span class="text-success">Thank you! Your download will begin shortly.</span>');
        $('#whitepaper_download')[0].reset();
      }
    },
    error: function () {
      $('#form_message').html('<span class="text-danger">Something went wrong. Please try again later.</span>');
    }
  });
});