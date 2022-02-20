
$(document).ready(function () {
    $("#btn-update").on("click", function (e) {

        e.preventDefault();
        var data = {
            'updatename': $('.updatename').val(),
            'type': $('#type option:selected').val(),
        };
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/updateaccount',
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
