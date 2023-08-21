var Toast = Swal.mixin({
    toast: true,
    position: "bottom-end",
    showConfirmButton: false,
    timer: 3000,
});

var dropify = $("#photo").dropify({
    messages: {
        default: "Klik atau seret gambar ke sini",
        replace: "Klik atau seret untuk mengubah gambar",
        remove: "Hapus",
        error: "Oops, Terjadi Kesalahan",
    },
});

dropify.on("dropify.afterClear", function () {
    $("#hiddenPhoto").val("");
});

var table = $("#table").DataTable({
    stateSave: true,
    processing: true,
    serverSide: true,
    autoWidth: false,
    responsive: true,
    ajax: document.URL,
    columns: [
        {
            data: "DT_RowIndex",
            name: "DT_RowIndex",
            searchable: false,
        },
        {
            data: "name",
            name: "name",
        },
        {
            data: "from",
            name: "from",
        },
        {
            data: "action",
            name: "action",
            orderable: false,
            searchable: false,
            class: "actions text-center",
        },
    ],
    oLanguage: {
        sSearch: "Pencarian",
        sInfoEmpty: "Data Belum Tersedia",
        sInfo: "Menampilkan _PAGE_ dari _PAGES_ halaman",
        sEmptyTable: "Data Belum Tersedia",
        sLengthMenu: "Tampilkan _MENU_ Baris",
        sZeroRecords: "Data Tidak Ditemukan",
        sProcessing: "Sedang Memproses...",
        oPaginate: {
            sFirst: "Pertama",
            sPrevious: "Sebelumnya",
            sNext: "Selanjutnya",
            sLast: "Terakhir",
        },
    },
});

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$("#create").click(function () {
    $("#formModal").modal("show");
    $("#modalTitle").html("Tambah Data");
    $("#button").html("Tambah").removeClass("btn-warning");
    $("#id").val("");
    $("#name").val("").removeClass("is-invalid");
    $("#from").val("").removeClass("is-invalid");
    $("#body").val("").removeClass("is-invalid");

    var dropify = $("#photo").dropify({
        defaultFile: null,
    });

    dropify = dropify.data("dropify");
    dropify.resetPreview();
    dropify.clearElement();
    dropify.settings.defaultFile = null;
    dropify.destroy();
    dropify.init();
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
            $("#name").val("").removeClass("is-invalid");
            $("#from").val("").removeClass("is-invalid");
            $("#body").val("").removeClass("is-invalid");
            $("#button").html(
                '<div class="text-center"><div class="spinner-border spinner-border-sm text-white"></div> Memproses...</div>'
            );
        },
        success: function (response) {
            table.ajax.reload(null, false);
            $("#formModal").modal("hide");

            Toast.fire({
                type: "success",
                title: response.status + "\n" + response.message,
            });
        },
        error: function (error) {
            $("#button").html("Simpan");

            if (error.status == 422) {
                var responseError = error["responseJSON"]["errors"];
                $("#nameError").html(responseError["name"]);
                $("#fromError").html(responseError["from"]);
                $("#bodyError").html(responseError["body"]);

                if (responseError["body"]) {
                    $("#body").addClass("is-invalid").focus();
                }

                if (responseError["from"]) {
                    $("#from").addClass("is-invalid").focus();
                }

                if (responseError["name"]) {
                    $("#name").addClass("is-invalid").focus();
                }
            }
        },
    });
});

$("body").on("click", ".edit", function () {
    $.ajax({
        type: "POST",
        url: document.URL + "/check",
        data: {
            id: $(this).data("id"),
        },
        success: function (response) {
            $("#formModal").modal("show");
            $("#modalTitle").html("Sunting Data");
            $("#button").html("Simpan").addClass("btn-warning");
            $("#name").val("").removeClass("is-invalid");
            $("#from").val("").removeClass("is-invalid");
            $("#body").val("").removeClass("is-invalid");

            $("#id").val(response.id);
            $("#name").val(response.name);
            $("#from").val(response.from);
            $("#body").val(response.body);
            $("#hiddenPhoto").val(response.photo);

            var dropify = $("#photo").dropify({
                defaultFile: response.photo,
            });

            dropify = dropify.data("dropify");
            dropify.resetPreview();
            dropify.clearElement();
            dropify.settings.defaultFile = response.photo;
            dropify.destroy();
            dropify.init();
        },
    });
});

$("body").on("click", ".delete", function () {
    if (confirm("Yakin ingin melanjutkan menghapus data ini?") === true) {
        $.ajax({
            type: "DELETE",
            url: document.URL + "/destroy",
            data: {
                id: $(this).data("id"),
            },
            success: function (response) {
                table.ajax.reload(null, false);
                Toast.fire({
                    type: "success",
                    title: response.status + "\n" + response.message,
                });
            },
            error: function (error) {
                console.log(error);
                if (error.status == 500) {
                    Toast.fire({
                        type: "error",
                        title: "Gagal! \nPeriksa koneksi databasemu.",
                    });
                } else if (error.status == 404) {
                    Toast.fire({
                        type: "error",
                        title: "Data Tidak Ditemukan! \nData mungkin telah terhapus sebelumnya.",
                    });
                    table.ajax.reload(null, false);
                } else if (error.status == 419) {
                    Toast.fire({
                        type: "error",
                        title: "Sesi Telah Berakhir! \nMemuat ulang sistem untuk anda.",
                    });

                    setTimeout(() => {
                        window.location.reload();
                    }, 3000);
                } else {
                    Toast.fire({
                        type: "error",
                        title: "Masalah Tidak Dikenali! \nMencoba memuat kembali untuk anda.",
                    });

                    setTimeout(() => {
                        window.location.reload();
                    }, 3000);
                }
            },
        });
    }
});
