$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#form").on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: 'forgot-password',
            method: $(this).attr("method"),
            data: new FormData(this),
            processData: false,
            dataType: "json",
            contentType: false,
            beforeSend: function() {
                $("#phoneNumber").removeClass('is-invalid');

                $("#submit").html(
                    'Mengirim'
                ).prop('disabled', true);
            },
            success: function(response) {
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
                            $("#otpModal").modal('show');
                            $("#token").val(response.token);
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

                $("#submit").html('Kirim OTP').prop('disabled', false);
            },
            error: function(error) {
                if (error.status == 422) {
                    var errors = error["responseJSON"]["errors"];
                    $("#phoneNumberError").html(errors["phone_number"]);

                    if (errors["phone_number"]) {
                        $("#phoneNumber").addClass('is-invalid').focus();
                    }
                }

                $("#submit").html('Kirim OTP').prop('disabled', false);
            },
        });
    });

    $("#otpForm").on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: 'otp',
            method: $(this).attr("method"),
            data: new FormData(this),
            processData: false,
            dataType: "json",
            contentType: false,
            beforeSend: function() {
                $("#otp").removeClass('is-invalid');

                $("#otpSubmit").prop('disabled', true);
            },
            success: function(response) {
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
                            location.href = response.route;
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

                $("#otpSubmit").prop('disabled', false);
            },
            error: function(error) {
                console.log(error);
                if (error.status == 422) {
                    var errors = error["responseJSON"]["errors"];
                    $("#otpError").html(errors["otp"]);

                    if (errors["otp"]) {
                        $("#otp").addClass('is-invalid').focus();
                    }
                }

                $("#otpSubmit").prop('disabled', false);
            },
        });
    });
});
