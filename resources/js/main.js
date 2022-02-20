$(document ).ready(function() {
    $("#btn-login").on("click", (e) => {
        e.preventDefault();
        var data = {
            'logins': $('.logins').val(),
            'password': $('.password').val(),
        }

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
            success (response) {
                console.log(response);
                Swal.fire(
                    response.message,
                    '12345',
                    response.header,
                )

            }
        });

    });

});

function redirect(url) {
    window.location.href = url;
}



