@extends('landing-page.template.base')
@section('content')
    <!-- About Area start -->
    <div class="about-page-area pt-130 rpt-120 rel z-1">
        <div class="container">
            <div class="row large-gap justify-content-between">
                <div class="col-lg-12">
                    <div class="about-page-content rmb-65 wow fadeInUp delay-0-2s">
                        <div class="section-title mb-20">
                            <span class="sub-title mb-15">Tentang Kami</span>
                            <h2>Pondok Sablon</h2>
                        </div>
                        <p>Toko Pondok Sablon merupakan salah satu unit usaha yang bergerak dalam bidang jasa desain dan
                            cetak yang melayani kebutuhan desain sablon tas kanvas, desain sablon cup plastik, desain sablon
                            paper bowl, desain sablon kantong plastik, desain sablon spundbon, desain sablon packaging
                            kertas nasi yang sesuai dengan kebutuhan dan keinginan para konsumen.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Area end -->


    <!-- Fact Counter start -->
    @include('landing-page.template.sections.counter')
    <!-- Fact Counter end -->

    <!-- Why Choose Area start -->
    <div class="why-choose-three pt-120 pb-100 rel z-1 bgc-black text-white">
        <div class="container">
            <div class="services-inner ">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="section-title text-center mb-60">
                            <span class="sub-title mb-15">Layanan Kami</span>
                            <h2>Kenapa Harus Gunakan Jasa Kami</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="service-item style-three wow fadeInUp delay-0-2s">
                            <div class="icon">
                                <i class="flaticon-network"></i>
                            </div>
                            <h5>Pekerja Berpengalaman</h5>
                            <p>Kami memiliki tenaga-tenaga ahli dalam bidang persablonan</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="service-item style-three wow fadeInUp delay-0-4s">
                            <div class="icon">
                                <i class="flaticon-air-plane"></i>
                            </div>
                            <h5>Gratis Ongkir</h5>
                            <p>Kami siap antar hasil sablon gratis di area kota ketapang</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="service-item style-three wow fadeInUp delay-0-6s">
                            <div class="icon">
                                <i class="flaticon-award"></i>
                            </div>
                            <h5>Sablon Berkualitas</h5>
                            <p>Kami menggunakan bahan sablon terbaik dan berkualitas</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="service-item style-three wow fadeInUp delay-0-8s">
                            <div class="icon">
                                <i class="flaticon-technical-support"></i>
                            </div>
                            <h5>Desain Gratis</h5>
                            <p>Jika anda bermasalah dengan desain, kami akan bantu</p>
                        </div>
                    </div>
                </div>
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
    </div>
    <!-- Why Choose Area end -->


    <!-- Testimonials start -->
    @include('landing-page.template.sections.testimony')
    <!-- Testimonials end -->


    <!-- CTA Area start -->
    @include('landing-page.template.sections.cta')
    <!-- CTA Area end -->
@endsection
