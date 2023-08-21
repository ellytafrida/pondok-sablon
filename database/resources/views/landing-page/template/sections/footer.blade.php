@php
    $web = App\Models\WebConfig::first();
@endphp
<!-- footer area start -->
<footer class="footer-area pt-80">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-4 col-md-6">
                <div class="widget widget_about wow fadeInUp delay-0-2s">
                    <div class="footer-logo mb-25">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('logo-text.png') }}" height="100" alt="Logo">
                        </a>
                    </div>
                    <p>{{ $web->about }}</p>
                    <div class="social-style-two mt-15">
                        @if (!empty($web->facebook))
                            <a href="{{ $web->facebook }}" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        @endif
                        @if (!empty($web->instagram))
                            <a href="{{ $web->instagram }}" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="widget widget_nav_menu wow fadeInUp delay-0-4s">
                    <h4 class="widget-title">Informasi</h4>
                    <ul>
                        <li><a href="{{ url('about') }}">Tentang Kami</a></li>
                        <li><a href="{{ url('blogs') }}">Blog</a></li>
                        <li><a href="{{ url('services') }}">Layanan</a></li>
                        <li><a href="{{ url('cart') }}">Keranjang</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="widget widget_contact_info wow fadeInUp delay-0-6s">
                    <h4 class="widget-title">Kontak Kami</h4>
                    <p>Butuh Bantuan? Silahkan hubungi kami lewat alamat dan kontak berikut</p>
                    <ul>
                        <li><i class="far fa-map-marker-alt"></i> {{ $web->address }}</li>
                        <li>
                            <i class="far fa-envelope"></i>
                            <a href="mailto:{{ $web->email }}">{{ $web->email }}</a>
                        </li>
                        <li><i class="far fa-phone"></i> {{ $web->phone_number }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom mt-15 pt-25 pb-10">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="copyright-text text-center text-lg-start">
                        <p>Hak Cipta © 2023. <a href="#">Elly Tafrida</a></p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="payment-method-image mb-15 text-center text-lg-end">
                        <a href="#">
                            <img src="{{ asset('assets-landing/images/footer/payment-method.png') }}"
                                alt="Metode Pembayaran">
                        </a>
                    </div>
                </div>
            </div>

            <!-- back to top area start -->
            <div class="back-to-top">
                <span class="back-top"><i class="fa fa-angle-up"></i></span>
            </div>
            <!-- back to top area end -->
        </div>
    </div>
</footer>
<!-- footer area end -->
