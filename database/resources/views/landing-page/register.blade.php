<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> Pondok Sablon</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">

    <!-- App css -->
    <link href="{{ asset('assets-admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets-admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets-admin/css/theme.min.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('assets-admin/plugins/sweetalert2/sweetalert2.min.css') }}">
</head>

<body>

    <div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center min-vh-100">
                        <div class="w-100 d-block bg-white shadow-lg rounded my-5">
                            <div class="row">
                                <div class="col-lg-5 d-none d-lg-block bg-login rounded-left"></div>
                                <div class="col-lg-7">
                                    <div class="p-5">
                                        <div class="text-center mb-5">
                                            <a href="{{ url('/') }}"
                                                class="text-dark font-size-22 font-family-secondary">
                                                <img src="{{ asset('logo.png') }}" height="35"> <b>PONDOK SABLON</b>
                                            </a>
                                        </div>
                                        <h1 class="h5 mb-1">Buat Akunmu</h1>
                                        <p class="text-muted mb-4">Buat akun untuk mendapatkan lebih banyak layanan
                                            kami, gak lama kok!</p>
                                        <form id="form" class="user" action="register" method="POST">
                                            <div class="form-group">
                                                <input id="name" type="text" name="name"
                                                    class="form-control form-control-user" placeholder="Nama Lengkap">
                                                <span id="nameError" class="invalid-feedback"></span>
                                            </div>
                                            <div class="form-group">
                                                <input id="email" type="text" name="email"
                                                    class="form-control form-control-user" placeholder="Alamat Email">
                                                <span id="emailError" class="invalid-feedback"></span>
                                            </div>
                                            <div class="form-group">
                                                <input id="phoneNumber" type="text" name="phone_number"
                                                    class="form-control form-control-user" placeholder="Nomor Handphone">
                                                <span id="phoneNumberError" class="invalid-feedback"></span>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <input id="password" type="password" name="password"
                                                        class="form-control form-control-user" placeholder="Kata Sandi">
                                                    <span id="passwordError" class="invalid-feedback"></span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input id="confirmPassword" type="password" name="confirm_password"
                                                        class="form-control form-control-user"
                                                        placeholder="Konfirmasi Kata Sandi">
                                                    <span id="confirmPasswordError" class="invalid-feedback"></span>
                                                </div>
                                            </div>
                                            <button id="submit" type="submit"
                                                class="btn btn-success btn-block waves-effect waves-light">
                                                Buat Akun
                                            </button>

                                            <div class="text-center mt-4">
                                                <h6 class="text-muted font-size-12">atau menggunakan</h6>

                                                <ul class="list-inline mt-3 mb-0">
                                                    <li class="list-inline-item">
                                                        <a href="{{ url('auth/facebook') }}"
                                                            class="social-list-item border-primary text-primary"><i
                                                                class="mdi mdi-facebook"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="{{ url('auth/google') }}"
                                                            class="social-list-item border-danger text-danger"><i
                                                                class="mdi mdi-google"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </form>

                                        <div class="row mt-4">
                                            <div class="col-12 text-center">
                                                <p class="text-muted mb-0">Sudah Punya Akun? <a
                                                        href="{{ url('login') }}"
                                                        class="text-muted font-weight-medium ml-1"><b>Masuk</b></a>
                                                </p>
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row -->
                                    </div> <!-- end .padding-5 -->
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div> <!-- end .w-100 -->
                    </div> <!-- end .d-flex -->
                </div> <!-- end col-->
            </div> <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- jQuery  -->
    <script src="{{ asset('assets-admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets-admin/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets-admin/js/metismenu.min.js') }}"></script>
    <script src="{{ asset('assets-admin/js/waves.js') }}"></script>
    <script src="{{ asset('assets-admin/js/simplebar.min.js') }}"></script>

    <script src="{{ asset('assets-admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets-admin/js/theme.js') }}"></script>

    <script src="{{ asset('js/register.js') }}"></script>
</body>

</html>
