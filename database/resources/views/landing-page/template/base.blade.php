<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pondok Sablon</title>

    <link rel=icon href="{{ asset('favicon.png') }}" sizes="20x20" type="image/png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets-landing/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-landing/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-landing/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-landing/css/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-landing/css/nice-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-landing/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-landing/css/flaticon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-landing/css/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-landing/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('assets-admin/plugins/sweetalert2/sweetalert2.min.css') }}">

    @stack('style')
</head>

<body>
    <div class="page-wrapper">
        <!--Form Back Drop-->
        <div class="form-back-drop"></div>

        <!-- Hidden Sidebar -->
        <section class="hidden-bar">
            <div class="inner-box text-center">
                <div class="cross-icon"><span class="fa fa-times"></span></div>
                <div class="title">
                    <h4>Get Appointment</h4>
                </div>

                <!--Appointment Form-->
                <div class="appointment-form">
                    <form method="post" action="contact.html">
                        <div class="form-group">
                            <input type="text" name="text" value="" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" value="" placeholder="Email Address" required>
                        </div>
                        <div class="form-group">
                            <textarea placeholder="Message" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="theme-btn">Submit now</button>
                        </div>
                    </form>
                </div>

                <!--Social Icons-->
                <div class="social-style-one">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                </div>
            </div>
        </section>
        <!--End Hidden Sidebar -->

        @include('landing-page.template.sections.navbar')

        @yield('content')

        @include('landing-page.template.sections.footer')

    </div>
    <!--End pagewrapper-->

    <!-- all plugins here -->
    <script src="{{ asset('assets-landing/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/appear.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/imageload.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/circle-progress.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/skill.bars.jquery.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets-landing/js/wow.min.js') }}"></script>

    <!-- main js  -->
    <script src="{{ asset('assets-landing/js/main.js') }}"></script>
    <script src="{{ asset('assets-admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>


    @stack('script')
</body>

</html>
