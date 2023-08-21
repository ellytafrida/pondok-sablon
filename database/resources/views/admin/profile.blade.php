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

            <div class="card">
                <div class="card-header">
                    <div class="btn-group float-left">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editProfileModal">
                            <i class="fa fa-edit"></i> Edit Profil
                        </button>
                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#changePasswordModal">
                            <i class="fa fa-key"></i> Ganti Password
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ asset(empty(Auth::user()->photo) ? 'images/default-photos.png' : Auth::user()->photo) }}"
                                class="img-fluid">
                        </div>
                        <div class="col-8">
                            <div class="mt-2">
                                <p class="font-size-12 text-muted mb-1">Nama Lengkap</p>
                                <h6>{{ Auth::user()->name }}</h6>
                            </div>

                            <div class="mt-3">
                                <p class="font-size-12 text-muted mb-1">Alamat Email</p>
                                <h6>{{ Auth::user()->email }}</h6>
                            </div>

                            <div class="mt-3">
                                <p class="font-size-12 text-muted mb-1">Nomor Handphone (Whatsapp)</p>
                                <h6>{{ Auth::user()->phone_number }}</h6>
                            </div>
                        </div>
                    </div>
                    <!--end card body-->
                </div><!-- end card-->
            </div>
        </div>
    </div>

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

@push('script')
    <script type="text/javascript" src="{{ asset('js/profile.js') }}"></script>
@endpush
