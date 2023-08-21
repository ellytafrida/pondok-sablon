@extends('landing-page.template.base')
@section('content')
    <!-- Product Details Start -->
    <section class="product-details-two pt-130 rpt-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-8 wow fadeInLeft delay-0-2s">
                    <div class="tab-content preview-images mb-30">
                        <div class="tab-pane fade preview-item active show" id="preview">
                            <img src="{{ asset(empty($service->image) ? 'images/blog-empty.jpg' : $service->image) }}">
                        </div>
                        @if (!empty($service->slide_1))
                            <div class="tab-pane fade preview-item" id="preview1">
                                <img src="{{ asset($service->slide_1) }}">
                            </div>
                        @endif
                        @if (!empty($service->slide_2))
                            <div class="tab-pane fade preview-item" id="preview2">
                                <img src="{{ asset($service->slide_2) }}">
                            </div>
                        @endif
                        @if (!empty($service->slide_3))
                            <div class="tab-pane fade preview-item" id="preview3">
                                <img src="{{ asset($service->slide_3) }}">
                            </div>
                        @endif
                        @if (!empty($service->slide_4))
                            <div class="tab-pane fade preview-item" id="preview4">
                                <img src="{{ asset($service->slide_4) }}">
                            </div>
                        @endif
                        @if (!empty($service->slide_5))
                            <div class="tab-pane fade preview-item" id="preview5">
                                <img src="{{ asset($service->slide_5) }}">
                            </div>
                        @endif
                    </div>
                    <div class="nav style-two thumb-images rmb-20 row">
                        @if (!empty($service->image))
                            <a href="#preview" data-bs-toggle="tab" class="thumb-item active show col">
                                <img src="{{ asset(empty($service->image) ? 'images/blog-empty.jpg' : $service->image) }}">
                            </a>
                        @endif
                        @if (!empty($service->slide_1))
                            <a href="#preview1" data-bs-toggle="tab" class="thumb-item col">
                                <img src="{{ asset($service->slide_1) }}">
                            </a>
                        @endif
                        @if (!empty($service->slide_2))
                            <a href="#preview2" data-bs-toggle="tab" class="thumb-item col">
                                <img src="{{ asset($service->slide_2) }}">
                            </a>
                        @endif
                        @if (!empty($service->slide_3))
                            <a href="#preview3" data-bs-toggle="tab" class="thumb-item col">
                                <img src="{{ asset($service->slide_3) }}">
                            </a>
                        @endif
                        @if (!empty($service->slide_4))
                            <a href="#preview4" data-bs-toggle="tab" class="thumb-item col">
                                <img src="{{ asset($service->slide_4) }}">
                            </a>
                        @endif
                        @if (!empty($service->slide_5))
                            <a href="#preview5" data-bs-toggle="tab" class="thumb-item col">
                                <img src="{{ asset($service->slide_5) }}">
                            </a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="product-details-content wow fadeInRight delay-0-2s">
                        <div class="section-title">
                            <h2>{{ $service->name }}</h2>
                        </div>
                        <div class="ratting-price mb-30">
                            <span class="text-danger">Rp. {{ $service->unit_price }}/Buah</span>
                        </div>
                        <hr class="mb-25">
                        <ul class="category-tags pt-10 pb-15">
                            <li>
                                <b>Kategori</b>
                                <span>:</span>
                                {{ $service->category->category }}
                            </li>
                            <li>
                                <b>Minimal</b>
                                <span>:</span>
                                {{ $service->minimum_order }} Buah
                            </li>
                        </ul>
                        <hr>
                        @if (Auth::check())
                            <form id="cartForm" class="add-to-cart pt-15">
                                <input id="id" type="hidden" name="id" value="{{ $service->id }}">
                                {{-- <select name="color" style="width: 100px;">
                                    <option value="Merah">Warna Merah</option>
                                </select> --}}
                                <input id="quantity" type="number" name="quantity" value="{{ $service->minimum_order }}"
                                    min="{{ $service->minimum_order }}"
                                    onchange="if(parseInt(this.value,10)<10)this.value='0'+this.value;" required>
                                <button type="submit" class="theme-btn">Masukkan Keranjang</button>
                            </form>
                        @else
                            <div class="add-to-cart pt-15">
                                <input id="quantity" type="number" name="quantity" value="{{ $service->minimum_order }}"
                                    min="{{ $service->minimum_order }}"
                                    onchange="if(parseInt(this.value,10)<10)this.value='0'+this.value;" required>
                                <a href="{{ url('login') }}"
                                    onclick="return confirm('Sebelum melanjutkan, harap login terlebih dahulu!')"
                                    class="theme-btn">Masukkan Keranjang</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <ul class="nav nav-tabs product-information-tab mt-80 mb-40 wow fadeInUp delay-0-2s">
                <li><a href="#details" data-bs-toggle="tab" class="active show">Deskripsi</a></li>
            </ul>
            <div class="tab-content pb-50 wow fadeInUp delay-0-2s">
                <div class="tab-pane fade active show" id="details">
                    {!! nl2br($service->description) !!}
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details End -->

    <!-- Related Product Area start -->
    <section class="related-product-area mt-90 mb-70">
        <div class="container pb-55">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7">
                    <div class="section-title text-center mb-35 wow fadeInUp delay-0-2s">
                        <h2>Produk Layanan Terkait</h2>
                    </div>
                </div>
            </div>
            <div class="realated-product-slider">
                @foreach ($related_services as $service)
                    <div class="product-item wow fadeInUp delay-0-2s">
                        <div class="image">
                            <img src="{{ asset(empty($service->image) ? 'images/blog-empty.jpg' : $service->image) }}">
                        </div>
                        <div class="content">
                            <div class="title-price">
                                <h5><a href="{{ url('services/detail', $service->id) }}">{{ $service->name }}</a></h5>
                            </div>
                            <div class="social-style-two">
                                <a href="#"><i class="far fa-shopping-cart"></i></a>
                                <a href="{{ url('services/detail', $service->id) }}"><i class="far fa-eye"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Related Product Area end -->
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $('#cartForm').on('submit', function(e) {
                e.preventDefault();

                var id = $("#id").val();
                var quantity = $("#quantity").val();

                $.ajax({
                    url: '/add-to-cart',
                    method: 'POST',
                    data: {
                        service_id: id,
                        quantity: quantity,
                    },
                    success: function(response) {
                        console.log(response);
                        Swal.fire({
                            type: "success",
                            title: response.status,
                            text: response.message,
                            confirmButtonText: "Lihat Keranjang",
                            backdrop: true,
                        }).then((result) => {
                            if (result.value == true) {
                                window.location.href = '/cart';
                            }
                        });
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endpush
