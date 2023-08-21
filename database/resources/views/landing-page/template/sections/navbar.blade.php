@php
    $web = App\Models\WebConfig::first();
@endphp
<!-- navbar start -->
<div class="navbar-top style-one text-white bgs-cover"
    style="background-image: {{ asset('assets-landing/images/background/header-top-bg.jpg') }};">
    <div class="container container-1570">
        <div class="row">
            <div class="col-lg-9">
                <div class="topbar-left text-lg-start text-center">
                    <i class="fal fa-location-circle"></i>
                    <b class="text-white">Alamat : {{ $web->address }}</b>
                </div>
            </div>
            <div class="col-lg-3">
                <ul class="topbar-right justify-content-center justify-content-lg-end">
                    <li class="social-style-one">
                        @if (!empty($web->facebook))
                            <a href="{{ $web->facebook }}" target="_blank">
                                <i class="fab fa-facebook-f" aria-hidden="true"></i>
                            </a>
                        @endif
                        @if (!empty($web->instagram))
                            <a href="{{ $web->instagram }}" target="_blank">
                                <i class="fab fa-instagram" aria-hidden="true"></i>
                            </a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<nav class="navbar style-one navbar-area navbar-expand-lg py-20">
    <div class="container container-1570">
        <div class="responsive-mobile-menu">
            <button class="menu toggle-btn d-block d-lg-none" data-target="#Iitechie_main_menu" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="icon-left"></span>
                <span class="icon-right"></span>
            </button>
        </div>
        <div class="logo">
            <a href="{{ url('/') }}"><img src="{{ asset('logo-text.png') }}" alt="img"></a>
        </div>

        <div class="collapse navbar-collapse" id="Iitechie_main_menu">
            <ul class="navbar-nav menu-open text-lg-end">
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li><a href="{{ url('about') }}">Tentang Kami</a></li>
                <li class="menu-item-has-children">
                    <a href="javascript:void(0)">Layanan</a>
                    <ul class="sub-menu">
                        @foreach (App\Models\ServiceCategory::all() as $category)
                            <li>
                                <a href="{{ url('services/category', Str::slug($category->category)) }}">
                                    {{ $category->category }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{ url('blogs') }}">Blog</a></li>
            </ul>
        </div>
        <div class="nav-right-part nav-right-part-desktop">
            {{-- {{ Auth::user() }} --}}
            @if (!Auth::check())
                <a href="{{ url('login') }}" class="theme-btn style-two">
                    Login <i class="far fa-long-arrow-right"></i>
                </a>
            @else
                <div class="collapse navbar-collapse" id="Iitechie_main_menu">
                    <ul class="navbar-nav menu-open text-lg-end">
                        <li class="menu-item-has-children">
                            <a href="javascript:void(0)">
                                <i class="far fa-user"></i>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{ url('profile') }}">
                                        Profil
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('orders') }}">
                                        Lihat Pesanan
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('logout') }}" class="text-danger">
                                        Keluar
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <button>
                    <a href="{{ url('cart') }}"><i class="far fa-shopping-basket text-dark"></i></a>
                </button>
                <button></button>
                <button></button>
                <button></button>
                <button></button>
            @endif
        </div>
    </div>
</nav>
<!-- navbar end -->
