@extends('admin.template.base')

@push('style')
    <link href="{{ asset('assets-admin/plugins/summernote/dist/summernote.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Data Layanan</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Master Data</a></li>
                                <li class="breadcrumb-item"><a href="{{ url('blogs') }}">Data Layanan</a></li>
                                <li class="breadcrumb-item active">{{ empty($service->id) ? 'Buat' : 'Edit' }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <form id="form" action="{{ url('services/store') }}">
                        <input type="hidden" name="id" value="{{ empty($service->id) ? null : $service->id }}">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-2">
                                            <label for="image" class="form-label">Gambar Thumbnail</label>
                                            <input id="hiddenImage" type="hidden" name="hidden_image"
                                                value="{{ empty($service->image) ? null : $service->image }}">
                                            <input id="image" type="file" class="dropify" name="image"
                                                data-default-file="{{ empty($service->image) ? null : asset($service->image) }}"
                                                data-allowed-file-extensions="jpeg jpg png" data-max-file-size="1000K">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-2">
                                            <label for="name" class="form-label">
                                                Nama<strong class="text-danger" title="Wajib Diisi">*</strong>
                                            </label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Nama Layanan"
                                                value="{{ empty($service->name) ? null : $service->name }}">
                                            <span id="nameError" class="invalid-feedback"></span>
                                        </div>
                                        <div class="mb-2">
                                            <label for="categoryId" class="form-label">
                                                Kategori<strong class="text-danger" title="Wajib Diisi">*</strong>
                                            </label>
                                            <select id="categoryId" name="category_id" class="form-control">
                                                <option value="" hidden selected disabled>*Pilih Kategori Layanan
                                                </option>
                                                @foreach ($service_categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        @if (!empty($service->category_id)) {{ $service->category_id == $category->id ? 'selected' : null }} @endif>
                                                        {{ $category->category }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span id="categoryError" class="invalid-feedback"></span>
                                        </div>
                                        <div class="mb-2">
                                            <label for="minimumOrder" class="form-label">
                                                Jumlah Minimal Order<strong class="text-danger"
                                                    title="Wajib Diisi">*</strong>
                                            </label>
                                            <input type="number" class="form-control" id="minimumOrder"
                                                name="minimum_order" placeholder="Jumlah Minimal Order"
                                                value="{{ empty($service->minimum_order) ? null : $service->minimum_order }}">
                                            <span id="minimumOrderError" class="invalid-feedback"></span>
                                        </div>
                                        <div class="mb-2">
                                            <label for="unitPrice" class="form-label">
                                                Harga Satuan<strong class="text-danger" title="Wajib Diisi">*</strong>
                                            </label>
                                            <input type="number" class="form-control" id="unitPrice" name="unit_price"
                                                placeholder="Harga Satuan"
                                                value="{{ empty($service->unit_price) ? null : $service->unit_price }}">
                                            <span id="unitPriceError" class="invalid-feedback"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label for="description" class="form-label">
                                        Deskripsi<strong class="text-danger" title="Wajib Diisi">*</strong>
                                        <strong id="descriptionError" class="text-danger"></strong>
                                    </label>
                                    <textarea id="description" name="description" class="form-control">{{ empty($service->description) ? null : $service->description }}</textarea>
                                </div>
                                <label class="form-label mt-4">Slide Lainnya</label>
                                <div class="row">
                                    <div class="col-2">
                                        <div class="mb-2">
                                            <input id="hiddenSlide1" type="hidden" name="hidden_slide_1"
                                                value="{{ empty($service->slide_1) ? null : $service->slide_1 }}">
                                            <input id="slide1" type="file" class="dropify" name="slide_1"
                                                data-default-file="{{ empty($service->slide_1) ? null : asset($service->slide_1) }}"
                                                data-allowed-file-extensions="jpeg jpg png" data-max-file-size="1000K">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="mb-2">
                                            <input id="hiddenSlide2" type="hidden" name="hidden_slide_2"
                                                value="{{ empty($service->slide_2) ? null : $service->slide_2 }}">
                                            <input id="slide2" type="file" class="dropify" name="slide_2"
                                                data-default-file="{{ empty($service->slide_2) ? null : asset($service->slide_2) }}"
                                                data-allowed-file-extensions="jpeg jpg png" data-max-file-size="1000K">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="mb-2">
                                            <input id="hiddenSlide3" type="hidden" name="hidden_slide_3"
                                                value="{{ empty($service->slide_3) ? null : $service->slide_3 }}">
                                            <input id="slide3" type="file" class="dropify" name="slide_3"
                                                data-default-file="{{ empty($service->slide_3) ? null : asset($service->slide_3) }}"
                                                data-allowed-file-extensions="jpeg jpg png" data-max-file-size="1000K">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="mb-2">
                                            <input id="hiddenSlide4" type="hidden" name="hidden_slide_4"
                                                value="{{ empty($service->slide_4) ? null : $service->slide_4 }}">
                                            <input id="slide4" type="file" class="dropify" name="slide_4"
                                                data-default-file="{{ empty($service->slide_4) ? null : asset($service->slide_4) }}"
                                                data-allowed-file-extensions="jpeg jpg png" data-max-file-size="1000K">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="mb-2">
                                            <input id="hiddenSlide5" type="hidden" name="hidden_slide_5"
                                                value="{{ empty($service->slide_5) ? null : $service->slide_5 }}">
                                            <input id="slide5" type="file" class="dropify" name="slide_5"
                                                data-default-file="{{ empty($service->slide_5) ? null : asset($service->slide_5) }}"
                                                data-allowed-file-extensions="jpeg jpg png" data-max-file-size="1000K">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-lg btn-dark float-right">Simpan</button>
                    </form>
                </div><!-- end col-->
            </div>
            <!-- end row-->
        </div> <!-- container-fluid -->
    </div>
@endsection

@push('script')
    <!-- Plugins js -->
    <script src="{{ asset('assets-admin/plugins/summernote/dist/summernote.min.js') }}"></script>

    <script>
        $(document).ready(function() {
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

            var description = $("#description").summernote();

            var image = $('#image').dropify({
                messages: {
                    default: 'Klik atau seret gambar ke sini',
                    replace: 'Klik atau seret untuk mengubah gambar',
                    remove: 'Hapus',
                    error: 'Oops, Terjadi Kesalahan'
                },
            });

            image.on("dropify.afterClear", function() {
                $("#hiddenImage").val("");
            });

            var slide1 = $('#slide1').dropify({
                messages: {
                    default: 'Klik atau seret gambar ke sini',
                    replace: 'Klik atau seret untuk mengubah gambar',
                    remove: 'Hapus',
                    error: 'Oops, Terjadi Kesalahan'
                },
            });

            slide1.on("dropify.afterClear", function() {
                $("#hiddenImage").val("");
            });

            var slide2 = $('#slide2').dropify({
                messages: {
                    default: 'Klik atau seret gambar ke sini',
                    replace: 'Klik atau seret untuk mengubah gambar',
                    remove: 'Hapus',
                    error: 'Oops, Terjadi Kesalahan'
                },
            });

            slide2.on("dropify.afterClear", function() {
                $("#hiddenImage").val("");
            });

            var slide3 = $('#slide3').dropify({
                messages: {
                    default: 'Klik atau seret gambar ke sini',
                    replace: 'Klik atau seret untuk mengubah gambar',
                    remove: 'Hapus',
                    error: 'Oops, Terjadi Kesalahan'
                },
            });

            slide3.on("dropify.afterClear", function() {
                $("#hiddenImage").val("");
            });

            var slide4 = $('#slide4').dropify({
                messages: {
                    default: 'Klik atau seret gambar ke sini',
                    replace: 'Klik atau seret untuk mengubah gambar',
                    remove: 'Hapus',
                    error: 'Oops, Terjadi Kesalahan'
                },
            });

            slide4.on("dropify.afterClear", function() {
                $("#hiddenImage").val("");
            });

            var slide5 = $('#slide5').dropify({
                messages: {
                    default: 'Klik atau seret gambar ke sini',
                    replace: 'Klik atau seret untuk mengubah gambar',
                    remove: 'Hapus',
                    error: 'Oops, Terjadi Kesalahan'
                },
            });

            slide5.on("dropify.afterClear", function() {
                $("#hiddenImage").val("");
            });



            $("#form").on("submit", function(e) {
                e.preventDefault();

                $.ajax({
                    method: "POST",
                    url: $(this).attr('action'),
                    data: new FormData(this),
                    processData: false,
                    dataType: "json",
                    contentType: false,
                    beforeSend: function() {
                        $("#name").removeClass('is-invalid');
                        $("#minimumOrder").removeClass('is-invalid');
                        $("#unitPrice").removeClass('is-invalid');
                        $("#categoryId").removeClass('is-invalid');
                        $("#descriptionError").html("");

                        $("#button").html(
                            '<div class="text-center"><div class="spinner-border spinner-border-sm text-white"></div> Memproses...</div>'
                        );
                    },
                    success: function(response) {
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
                                window.location.href = "/services";
                            }
                        });
                    },
                    error: function(error) {
                        console.log(error);
                        $("#button").html("Simpan");

                        if (error.status == 422) {
                            var responseError = error["responseJSON"]["errors"];
                            $("#nameError").html(responseError["name"]);
                            $("#minimumOrderError").html(responseError["minimum_order"]);
                            $("#unitPriceError").html(responseError["unit_price"]);
                            $("#categoryError").html(responseError["category_id"]);
                            $("#descriptionError").html(responseError["description"]);

                            if (responseError["category_id"]) {
                                $("#categoryId").addClass('is-invalid');
                            }

                            if (responseError["unit_price"]) {
                                $("#unitPrice").addClass('is-invalid').focus();
                            }

                            if (responseError["minimum_order"]) {
                                $("#minimumOrder").addClass('is-invalid').focus();
                            }

                            if (responseError["name"]) {
                                $("#name").addClass('is-invalid').focus();
                            }
                        }
                    },
                });
            });
        });
    </script>
@endpush
