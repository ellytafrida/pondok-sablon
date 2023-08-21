@extends('admin.template.base')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Profil Saya</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Menu Admin</a></li>
                                <li class="breadcrumb-item active">Profil Saya</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <form id="form" action="information/update" method="POST">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-2">
                                    <label for="name" class="form-label">Nama Usaha<strong
                                            class="text-danger">*</strong>
                                    </label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $web->name }}">
                                    <span id="nameError" class="invalid-feedback"></span>
                                </div>
                                <div class="mb-2">
                                    <label for="email" class="form-label">Email<strong class="text-danger">*</strong>
                                    </label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        value="{{ $web->email }}">
                                    <span id="emailError" class="invalid-feedback"></span>
                                </div>
                                <div class="mb-2">
                                    <label for="phoneNumber" class="form-label">Nomor Handphone<strong
                                            class="text-danger">*</strong>
                                    </label>
                                    <input type="text" class="form-control" id="phoneNumber" name="phone_number"
                                        value="{{ $web->phone_number }}">
                                    <span id="phoneNumberError" class="invalid-feedback"></span>
                                </div>
                                <hr>
                                <div class="mb-2">
                                    <textarea id="about" class="form-control" name="about">{{ $web->about }}</textarea>
                                    <span id="aboutError" class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-2">
                                    <label for="address" class="form-label">Alamat<strong class="text-danger">*</strong>
                                    </label>
                                    <textarea id="address" class="form-control" name="address">{{ $web->address }}</textarea>
                                    <span id="addressError" class="invalid-feedback"></span>
                                </div>
                                <div class="mb-2">
                                    <label for="instagram" class="form-label">Link Instagram<strong
                                            class="text-danger">*</strong>
                                    </label>
                                    <input type="text" class="form-control" id="instagram" name="instagram"
                                        value="{{ $web->instagram }}">
                                    <span id="instagramError" class="invalid-feedback"></span>
                                </div>
                                <div class="mb-2">
                                    <label for="facebook" class="form-label">Link Facebook<strong
                                            class="text-danger">*</strong>
                                    </label>
                                    <input type="text" class="form-control" id="facebook" name="facebook"
                                        value="{{ $web->facebook }}">
                                    <span id="facebookError" class="invalid-feedback"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button id="button" type="submit" class="btn btn-primary float-right">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script type="text/javascript" src="{{ asset('js/information-admin.js') }}"></script>
@endpush
