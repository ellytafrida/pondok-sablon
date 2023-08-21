$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#form").on("submit", function (e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr("action"),
            method: $(this).attr("method"),
            data: new FormData(this),
            processData: false,
            dataType: "json",
            contentType: false,
            beforeSend: function () {
                $("#name").removeClass("is-invalid");
                $("#email").removeClass("is-invalid");
                $("#phoneNumber").removeClass("is-invalid");
                $("#password").removeClass("is-invalid");
                $("#confirmPassword").removeClass("is-invalid");
                $("#submit")
                    .html(
                        '<div class="text-center"><div class="spinner-border spinner-border-sm text-white"></div></div>'
                    )
                    .prop("disabled", true);
            },
            success: function (response) {
                // if (response.code == 200) {
                Swal.fire({
                    type: "success",
                    title: response.status,
                    text: response.message,
                    confirmButtonColor: "#59C4BC",
                    confirmButtonText: "Lanjut",
                    backdrop: true,
                    allowOutsideClick: () => {
                        console.log("Klik Tombol Lanjut");
                    },
                }).then((result) => {
                    if (result.value == true) {
                        window.location.href = "/login";
                    }
                });

                $("#submit").html("Buat Akun").prop("disabled", false);
            },
            error: function (error) {
                console.log(error);
                if (error.status == 422) {
                    var rspError = error["responseJSON"]["errors"];
                    $("#nameError").html(rspError["name"]);
                    $("#emailError").html(rspError["email"]);
                    $("#phoneNumberError").html(rspError["phone_number"]);
                    $("#passwordError").html(rspError["password"]);
                    $("#confirmPasswordError").html(
                        rspError["confirm_password"]
                    );

                    if (rspError["confirm_password"]) {
                        $("#confirmPassword").focus();
                        $("#confirmPassword").addClass("is-invalid");
                    }

                    if (rspError["password"]) {
                        $("#password").focus();
                        $("#password").addClass("is-invalid");
                    }

                    if (rspError["phone_number"]) {
                        $("#phoneNumber").focus();
                        $("#phoneNumber").addClass("is-invalid");
                    }

                    if (rspError["email"]) {
                        $("#email").focus();
                        $("#email").addClass("is-invalid");
                    }

                    if (rspError["name"]) {
                        $("#name").focus();
                        $("#name").addClass("is-invalid");
                    }
                }

                $("#submit").html("Buat Akun").prop("disabled", false);
            },
        });
    });
});
