<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Lupa Kata Sandi - Admin Pondok Sablon</title>
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
                                <h1 class="h5 mb-1">Lupa Kata Sandi!</h1>
                                <p class="text-muted mb-4">Kami akan mengirimkan kode OTP melalui whatsapp.</p>
                                <form id="form" class="user" action="login" method="POST">
                                    <div class="form-group">
                                        <input id="phoneNumber" type="text" name="phone_number"
                                            class="form-control form-control-user" placeholder="Nomor Handphone">
                                        <span id="phoneNumberError" class="invalid-feedback"></span>
                                    </div>
                                    <button id="submit" type="submit"
                                        class="btn btn-success btn-block waves-effect waves-light">
                                        Kirim OTP
                                    </button>
                                </form>

                                <div class="row mt-4">
                                    <div class="col-12 text-center">
                                        <p class="text-muted mb-2">
                                            <a href="{{ url('login') }}" class="text-muted font-weight-medium ml-1">
                                                Sudah Ingat Kata Sandimu?
                                            </a>
                                        </p>
                                    </div> <!-- end col -->
                                </div>
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

    <div class="modal fade" id="otpModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div id="modalHeader" class="modal-header">
                    <h4 class="modal-title fs-5" id="modalTitle">Masukkan OTP</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="otpForm" method="POST">
                    <input id="token" type="hidden" name="token">
                    <div class="modal-body">
                        <div class="mb-2">
                            <input type="text" class="form-control" id="otp" name="otp"
                                placeholder="Masukkan OTP">
                            <span id="otpError" class="invalid-feedback"></span>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button id="otpSubmit" type="submit" class="btn btn-dark">Lanjut</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- jQuery  -->
    <script src="{{ asset('assets-admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets-admin/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets-admin/js/metismenu.min.js') }}"></script>
    <script src="{{ asset('assets-admin/js/waves.js') }}"></script>
    <script src="{{ asset('assets-admin/js/simplebar.min.js') }}"></script>

    <script src="{{ asset('assets-admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets-admin/js/theme.js') }}"></script>

    <script src="{{ asset('js/forgot-password.js') }}"></script>
</body>

</html>
