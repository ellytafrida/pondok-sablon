$(document).ready(function() {
    $("#password").focus();

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#form").on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: 'reset-password',
            method: $(this).attr("method"),
            data: new FormData(this),
            processData: false,
            dataType: "json",
            contentType: false,
            beforeSend: function() {
                $("#password").removeClass('is-invalid');
                $("#confirmPassword").removeClass('is-invalid');

                $("#button").html(
                    '<i class="bx bx-loader bx-spin font-size-16 align-middle me-2"></i>'
                ).prop('disabled', true);
            },
            success: function(response) {
                console.log(response);
                if (response.code == 200) {
                    Swal.fire({
                        type: "success",
                        title: response.status,
                        text: response.message,
                        confirmButtonText: "Lanjut",
                        confirmButtonColor: "#007BFF",
                        backdrop: true,
                        allowOutsideClick: () => {
                            console.log("Klik Tombol Lanjut");
                        },
                    }).then((result) => {
                        if (result.value == true) {
                            window.location.href = '/login';
                        }
                    });
                } else {
                    Swal.fire({
                        type: "error",
                        title: response.status,
                        text: response.message,
                        confirmButtonText: "Tutup",
                        confirmButtonColor: "#6C757D",
                    });
                }

                $("#button").html('Kirim').prop('disabled', false);
            },
            error: function(error) {
                console.log(error);
                if (error.status == 422) {
                    var errors = error["responseJSON"]["errors"];
                    $("#passwordError").html(errors["password"]);
                    $("#confirmPasswordError").html(errors["confirm_password"]);

                    if (errors["confirm_password"]) {
                        $("#confirmPassword").addClass('is-invalid').focus();
                    }

                    if (errors["password"]) {
                        $("#password").addClass('is-invalid').focus();
                    }
                }

                $("#button").html('Kirim').prop('disabled', false);
            },
        });
    });
});
