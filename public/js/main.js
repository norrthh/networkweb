
$(document).ready(function () {
  $("#btn-login").on("click", function (e) {
    e.preventDefault();
    var data = {
      'logins': $('.logins').val(),
      'password': $('.password').val()
    };
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: '/loggins',
      type: 'POST',
      dataType: 'json',
      data: data,
      success: function success(response) {
          if (response.url) setTimeout(redirect, 2000, response.url);
        Swal.fire(
            // response.message,
            // '',
            // response.header\
            response.title,
            response.message,
            response.header
        );
      }
    });
  });

  $("#admin-auth").on("click", function (e) {
      e.preventDefault();
      var data = {
          'apassword': $('.apassword').val()
      };
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
          url: '/adminauth',
          type: 'POST',
          dataType: 'json',
          data: data,
          success: function success(response) {
              if (response.url) setTimeout(redirect, 2000, response.url);
              Swal.fire(
                  response.title,
                  response.message,
                  response.header
              );
          }
      });
  });
});

function redirect(url) {
  window.location.href = url;
}
