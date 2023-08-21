<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login - Admin Pondok Sablon</title>
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
                    <div class="d-flex align-items-center justify-content-center min-vh-100">
                        <div class="d-block bg-white shadow-lg rounded my-5">
                            <div class="p-5">
                                <div class="text-center mb-5">
                                    <a href="{{ url('/') }}" class="text-dark font-size-22 font-family-secondary">
                                        <img src="{{ asset('logo.png') }}" height="35"> <b>PONDOK SABLON</b>
                                    </a>
                                </div>
                                <h1 class="h5 mb-1">Atur Ulang Kata Sandimu!</h1>
                                <p class="text-muted mb-4">Masukkan kata sandi baru untuk mengatur ulang kata sandimu.
                                </p>
                                <form id="form" class="user" action="login" method="POST">
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <div class="form-group">
                                        <label for="password" class="form-label">Kata Sandi Baru</label>
                                        <input id="password" type="password" name="password"
                                            class="form-control form-control-user" placeholder="Kata Sandi Baru">
                                        <span id="passwordError" class="invalid-feedback"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirmPassword" class="form-label">Konfirmasi Kata Sandi</label>
                                        <input id="confirmPassword" type="password" name="confirm_password"
                                            class="form-control form-control-user" placeholder="Konfirmasi Kata Sandi">
                                        <span id="confirmPasswordError" class="invalid-feedback"></span>
                                    </div>
                                    <button id="submit" type="submit"
                                        class="btn btn-success btn-block waves-effect waves-light">
                                        Ganti
                                    </button>
                                </form>
                                <!-- end row -->
                            </div> <!-- end .padding-5 -->
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

    <script src="{{ asset('js/reset-password.js') }}"></script>
</body>

</html>
