@extends('admin.template.base')

@push('style')
    <link href="{{ asset('assets-admin/plugins/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets-admin/plugins/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets-admin/plugins/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Data Blog</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Master Data</a></li>
                                <li class="breadcrumb-item"><a href="{{ url('blogs') }}">Data Blog</a></li>
                                <li class="breadcrumb-item active">{{ empty($blog->id) ? 'Buat' : 'Edit' }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <form id="form" action="{{ url('blogs/store') }}">
                        <input type="hidden" name="id" value="{{ empty($blog->id) ? null : $blog->id }}">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-2">
                                            <label for="image" class="form-label">Gambar Thumbnail</label>
                                            <input id="hiddenImage" type="hidden" name="hidden_image"
                                                value="{{ empty($blog->image) ? null : $blog->image }}">
                                            <input id="image" type="file" class="dropify" name="image"
                                                data-default-file="{{ empty($blog->image) ? null : asset($blog->image) }}"
                                                data-allowed-file-extensions="jpeg jpg png" data-max-file-size="1000K">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-2">
                                            <label for="title" class="form-label">
                                                Judul<strong class="text-danger" title="Wajib Diisi">*</strong>
                                            </label>
                                            <input type="text" class="form-control" id="title" name="title"
                                                placeholder="Judul Berita"
                                                value="{{ empty($blog->title) ? null : $blog->title }}">
                                            <span id="titleError" class="invalid-feedback"></span>
                                        </div>
                                        <div class="mb-2">
                                            <label for="categoryId" class="form-label">
                                                Kategori<strong class="text-danger" title="Wajib Diisi">*</strong>
                                            </label>
                                            <select id="categoryId" name="category_id" class="form-control">
                                                <option value="" hidden selected disabled>*Pilih Kategori Artikel
                                                </option>
                                                @foreach ($blog_categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        @if (!empty($blog->category_id)) {{ $blog->category_id == $category->id ? 'selected' : null }} @endif>
                                                        {{ $category->category }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span id="categoryError" class="invalid-feedback"></span>
                                        </div>
                                    </div>
                                </div>

                                <textarea id="hiddenBody" name="body" style="display: none;"></textarea>
                                <div class="mb-2">
                                    <label for="body" class="form-label">
                                        Isi
                                    </label>
                                    <div id="body" class="summernote" style="height: 300px;">
                                        {!! empty($blog->body) ? null : nl2br($blog->body) !!}
                                    </div>
                                </div>
                            </div> <!-- end card body-->
                        </div> <!-- end card -->
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
    <script src="{{ asset('assets-admin/plugins/katex/katex.min.js') }}"></script>
    <script src="{{ asset('assets-admin/plugins/quill/quill.min.js') }}"></script>

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

            var quill = new Quill('#body', {
                theme: 'snow',
                modules: {
                    'toolbar': [
                        [{
                            'font': []
                        }, {
                            'size': []
                        }],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{
                            'color': []
                        }, {
                            'background': []
                        }],
                        [{
                            'script': 'super'
                        }, {
                            'script': 'sub'
                        }],
                        [{
                            'header': [false, 1, 2, 3, 4, 5, 6]
                        }, 'blockquote', 'code-block'],
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }, {
                            'indent': '-1'
                        }, {
                            'indent': '+1'
                        }],
                        ['direction', {
                            'align': []
                        }],
                        ['clean']
                    ]
                },
            });

            var dropify = $('.dropify').dropify({
                messages: {
                    default: 'Klik atau seret gambar ke sini',
                    replace: 'Klik atau seret untuk mengubah gambar',
                    remove: 'Hapus',
                    error: 'Oops, Terjadi Kesalahan'
                },
            });

            dropify.on("dropify.afterClear", function() {
                $("#hiddenImage").val("");
            });

            $("#form").on("submit", function(e) {
                e.preventDefault();
                $("#hiddenBody").val($("#body").html());

                $.ajax({
                    method: "POST",
                    url: $(this).attr('action'),
                    data: new FormData(this),
                    processData: false,
                    dataType: "json",
                    contentType: false,
                    beforeSend: function() {
                        $("#title").removeClass('is-invalid');
                        $("#categoryId").removeClass('is-invalid');
                        $("#bodyError").html("");

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
                                window.location.href = "/blogs";
                            }
                        });
                    },
                    error: function(error) {
                        console.log(error);
                        $("#button").html("Simpan");

                        if (error.status == 422) {
                            var responseError = error["responseJSON"]["errors"];
                            $("#titleError").html(responseError["title"]);
                            $("#categoryError").html(responseError["category_id"]);
                            $("#bodyError").html(responseError["body"]);

                            if (responseError["title"]) {
                                $("#title").addClass('is-invalid').focus();
                            }

                            if (responseError["category_id"]) {
                                $("#categoryId").addClass('is-invalid');
                            }
                        }
                    },
                });
            });
        });
    </script>
@endpush
