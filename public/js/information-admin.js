var Toast = Swal.mixin({
    toast: true,
    position: "bottom-end",
    showConfirmButton: false,
    timer: 3000,
});

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
            $("#button").html(
                '<div class="text-center"><div class="spinner-border spinner-border-sm text-white"></div> Memproses...</div>'
            );
        },
        success: function (response) {
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
                    window.location.reload();
                }
            });
        },
        error: function (error) {
            console.error(error);
            $("#button").html("Simpan");

            if (error.status == 422) {
                var responseError = error["responseJSON"]["errors"];
                $("#nameError").html(responseError["name"]);
                $("#emailError").html(responseError["email"]);

                if (responseError["phone_number"]) {
                    $("#phoneNumber").addClass("is-invalid").focus();
                }

                if (responseError["email"]) {
                    $("#email").addClass("is-invalid").focus();
                }

                if (responseError["name"]) {
                    $("#name").addClass("is-invalid").focus();
                }
            }
        },
    });
});
