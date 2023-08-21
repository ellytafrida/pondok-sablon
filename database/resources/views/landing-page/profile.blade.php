@extends('landing-page.template.base')
@section('content')
    <!-- Page Banner Start -->
    <section class="page-banner bgs-cover text-white pt-65 pb-75 mt-100"
        style="background-image: url('images/bg-login.jpeg');">
        <div class="container">
            <div class="banner-inner">
                <h2 class="page-title wow fadeInUp delay-0-2s">Profil</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb wow fadeInUp delay-0-4s" style="background-color: #212F3C;">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Pondok Sablon</a></li>
                        <li class="breadcrumb-item active">Profil</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- Page Banner End -->

    <section class="shop-page-three-area py-80">
        <div class="container px-5 mx-5">
            <div class="row">
                <div class="col-2">
                    <label>Foto: </label>
                    <img src="{{ asset('images/default-photos.png') }}" class="img-fluid">
                </div>
                <div class="col-7 px-4">
                    <label>Data Pribadi: </label>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Nama Pengguna : {{ Auth::user()->name }}</li>
                        <li class="list-group-item">Nomor HP : {{ Auth::user()->phone_number }}</li>
                        <li class="list-group-item">Email : {{ Auth::user()->email }}</li>
                        <li class="list-group-item">Bergabung Sejak : {{ Auth::user()->created_at }}</li>
                    </ul>
                </div>
                <div class="col-3">

                </div>
            </div>
            {{-- <div class="btn-group mt-4">
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#editProfileModal"><i
                        class="fa fa-edit"></i> Edit Profil</button>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#changePasswordModal"><i
                        class="fa fa-key"></i> Ganti Password</button>
            </div> --}}
        </div>
    </section>

    <div class="modal fade" id="editProfileModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5">Edit Profil</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editProfileForm" action="administrators/store" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="mb-2">
                                    <label for="title" class="form-label">Foto</label>
                                    <input id="hiddenPhoto" type="hidden" name="hidden_photo"
                                        value="{{ empty(Auth::user()->photo) ? null : Auth::user()->photo }}">
                                    <input id="photo" type="file" class="dropify" name="photo"
                                        data-default-file="{{ empty(Auth::user()->photo) ? null : asset(Auth::user()->photo) }}"
                                        data-allowed-file-extensions="jpeg jpg png" data-max-file-size="1000K">
                                </div>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="mb-2">
                                    <label for="name" class="form-label">Nama<strong class="text-danger">*</strong>
                                    </label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Nama Lengkap" value="{{ Auth::user()->name }}">
                                    <span id="nameError" class="invalid-feedback"></span>
                                </div>
                                <div class="mb-2">
                                    <label for="email" class="form-label">Email<strong class="text-danger">*</strong>
                                    </label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        placeholder="Email" value="{{ Auth::user()->email }}">
                                    <span id="emailError" class="invalid-feedback"></span>
                                </div>
                                <div class="mb-2">
                                    <label for="phoneNumber" class="form-label">Nomor Handphone<strong
                                            class="text-danger">*</strong>
                                    </label>
                                    <input type="text" class="form-control" id="phoneNumber" name="phone_number"
                                        placeholder="Nomor Handphone" value="{{ Auth::user()->phone_number }}">
                                    <span id="phoneNumberError" class="invalid-feedback"></span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button id="button" type="submit" class="btn btn-dark">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="changePasswordModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5">Ganti Kata Sandi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="changePasswordForm" action="change-password" method="POST">
                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="oldPassword" class="form-label">
                                Kata Sandi Lama<strong class="text-danger">*</strong>
                            </label>
                            <input type="password" class="form-control" id="oldPassword" name="old_password"
                                placeholder="Kata Sandi Lama">
                            <span id="oldPasswordError" class="invalid-feedback"></span>
                        </div>
                        <div class="mb-2">
                            <label for="newPassword" class="form-label">
                                Kata Sandi Baru<strong class="text-danger">*</strong>
                            </label>
                            <input type="password" class="form-control" id="newPassword" name="new_password"
                                placeholder="Kata Sandi Baru">
                            <span id="newPasswordError" class="invalid-feedback"></span>
                        </div>
                        <div class="mb-2">
                            <label for="confirmPassword" class="form-label">
                                Konfirmasi Kata Sandi<strong class="text-danger">*</strong>
                            </label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirm_password"
                                placeholder="Konfirmasi Kata Sandi">
                            <span id="confirmPasswordError" class="invalid-feedback"></span>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button id="changePasswordButton" type="submit" class="btn btn-dark">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
