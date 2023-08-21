@extends('landing-page.template.base')

@section('content')
    <!-- hero Area start -->
    <div class="hero-area pt-145 pb-75 rel z-1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content rmb-55 wow fadeInUp delay-0-2s">
                        <span class="sub-title mb-15">Pondok Sablon</span>
                        <h1>Tempat Sablon Terpercaya di Ketapang</h1>
                        <p>Ini alasan mengapa kami adalah penyedia jasa sablon terbaik</p>
                        <ul class="list-style-one pt-10 wow fadeInUp delay-0-3s">
                            <li>Hasil Terbaik</li>
                            <li>Harga Termurah</li>
                        </ul>
                        <div class="hero-btns pt-25 wow fadeInUp delay-0-4s">
                            <a href="{{ url('about') }}" class="theme-btn">
                                Tentang Kami <i class="far fa-long-arrow-right"></i>
                            </a>
                            <a href="{{ url('services') }}" class="theme-btn style-three">
                                Layanan Kami <i class="far fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-images wow fadeInLeft delay-0-2s">
                        <img class="w-100" src="{{ asset('images/hero-2.jpeg') }}">
                        <img class="image-one wow fadeInRight delay-0-6s" src="{{ asset('images/hero-3.jpeg') }}">
                        <img class="image-two wow fadeInDown delay-0-8s" src="{{ asset('images/hero-1.jpeg') }}">
                        <div class="circle-shapes">
                            <div class="shape-inner">
                                <span class="dot-one"></span>
                                <span class="dot-two"></span>
                                <span class="dot-three"></span>
                                <span class="dot-four"></span>
                                <span class="dot-five"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- hero Area end -->

    <!-- Services Area start -->
    <div class="services-area rel z-1">
        <div class="container-fluid">
            <div class="services-inner text-white bgc-black">
                <div class="row align-items-center">
                    <div class="col-xl-4 col-lg-7">
                        <div class="service-content rel p-100 py-130 rpb-100 wow fadeInUp delay-0-2s">
                            <div class="section-title mb-30">
                                <span class="sub-title mb-15">Layanan Kami</span>
                                <h2>Kenapa Harus Gunakan Jasa Kami</h2>
                            </div>
                            <p>baca lebih lengkap tentang perjalanan kami membangun pondok sablon.</p>
                            <a href="{{ url('about') }}" class="theme-btn hover-two mt-20">
                                Tentang Kami <i class="far fa-long-arrow-right"></i>
                            </a>
                            <div class="circle-shapes no-animation">
                                <div class="shape-inner">
                                    <span class="dot-one"></span>
                                    <span class="dot-two"></span>
                                    <span class="dot-three"></span>
                                    <span class="dot-four"></span>
                                    <span class="dot-five"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="row no-gap">
                            <div class="col-md-6">
                                <div class="service-item wow fadeInDown delay-0-4s">
                                    <div class="icon">
                                        <i class="flaticon-print"></i>
                                    </div>
                                    <h3>Pekerja Berpengalaman</h3>
                                    <p>
                                        Kami memiliki tenaga-tenaga ahli dalam bidang persablonan
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="service-item wow fadeInDown delay-0-4s">
                                    <div class="icon">
                                        <i class="flaticon-air-plane"></i>
                                    </div>
                                    <h3>Gratis Ongkir</h3>
                                    <p>
                                        Kami siap antar hasil sablon gratis di area kota ketapang
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="service-item wow fadeInUp delay-0-6s">
                                    <div class="icon">
                                        <i class="flaticon-print-1"></i>
                                    </div>
                                    <h3>Sablon Berkualitas</h3>
                                    <p>
                                        Kami menggunakan bahan sablon terbaik dan berkualitas
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="service-item wow fadeInUp delay-0-6s">
                                    <div class="icon">
                                        <i class="flaticon-focus"></i>
                                    </div>
                                    <h3>Desain Gratis</h3>
                                    <p>
                                        Jika anda bermasalah dengan desain, kami akan bantu
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services Area end -->


    <!-- Fact Counter start -->
    @include('landing-page.template.sections.counter')
    <!-- Fact Counter end -->


    <!-- CTA Area start -->
    @include('landing-page.template.sections.cta')
    <!-- CTA Area end -->


    <!-- Testimonials start -->
    @include('landing-page.template.sections.testimony')
    <!-- Testimonials end -->


    <!-- Blog Area start -->
    <section class="blog-area z-1 rel bgc-lighter pt-120 pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7">
                    <div class="section-title text-center mb-55 wow fadeInUp delay-0-2s">
                        <span class="sub-title mb-10">Blog</span>
                        <h2>Cerita-cerita menarik dalam perjalanan kami</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($random_blogs as $blog)
                    <div class="col-xl-4 col-md-6">
                        <div class="blog-item wow fadeInUp delay-0-2s">
                            <div class="image">
                                <img src="{{ asset(empty($blog->image) ? 'images/blog-empty.jpg' : $blog->image) }}"
                                    alt="Blog">
                            </div>
                            <div class="content">
                                <span class="date">
                                    <i class="far fa-calendar-alt"></i>
                                    <a
                                        href="javascript:void(0)">{{ Carbon\Carbon::parse($blog->published_at)->diffForHumans() }}</a>
                                </span>
                                <h4>
                                    <a href="{{ url('blogs', $blog->slug) }}">
                                        {{ $blog->title }}
                                    </a>
                                </h4>
                                <a href="{{ url('blogs', $blog->slug) }}" class="read-more">
                                    Lebih Lanjut <i class="far fa-long-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="circle-shapes">
            <div class="shape-inner">
                <span class="dot-one"></span>
                <span class="dot-two"></span>
                <span class="dot-three"></span>
                <span class="dot-four"></span>
                <span class="dot-five"></span>
            </div>
        </div>
    </section>
    <!-- Blog Area end -->
@endsection
