@extends('landing-page.template.base')

@section('content')
    <!-- Shop Page Area start -->
    <section class="shop-page-three-area py-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop-sidebar rmb-75">
                        <div class="widget widget-category wow fadeInUp delay-0-4s">
                            <h5 class="widget-title">Kategori</h5>
                            <ul>
                                @foreach ($service_categories as $category)
                                    <li
                                        class="{{ $category->category == (empty($category_selected->category) ? null : $category_selected->category) ? 'text-danger' : null }}">
                                        <a href="{{ url('services/category', Str::slug($category->category)) }}"
                                            class="{{ $category->category == (empty($category_selected->category) ? null : $category_selected->category) ? 'text-danger' : null }}">
                                            {{ $category->category }}
                                        </a>
                                        <span>({{ $category->services->count() }})</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop-three-wrap">
                        @foreach ($services as $service)
                            <div class="product-item style-two wow fadeInUp delay-0-2s">
                                <div class="image">
                                    <img
                                        src="{{ asset(empty($service->image) ? 'images/blog-empty.jpg' : $service->image) }}">
                                </div>
                                <div class="product-content">
                                    <h3><a href="{{ url('services/detail', $service->id) }}">{{ $service->name }}</a></h3>
                                    <div class="text-danger">Rp. {{ $service->unit_price }}/buah</div>
                                    <div>{!! Str::limit($service->description) !!}</div>
                                    <div class="social-style-two">
                                        @if (Auth::check())
                                            <a href="javascript:void(0)" class="add-to-cart" data-id="{{ $service->id }}"
                                                data-quantity="{{ $service->minimum_order }}">
                                                <span>Tambah Ke Keranjang</span>
                                                <i class="far fa-shopping-cart"></i>
                                            </a>
                                        @else
                                            <a href="{{ url('login') }}"
                                                onclick="return confirm('Sebelum melanjutkan, harap login terlebih dahulu!')">
                                                <span>Tambah Ke Keranjang</span>
                                                <i class="far fa-shopping-cart"></i>
                                            </a>
                                        @endif

                                        <a href="{{ url('services/detail', $service->id) }}"><i class="far fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Page Area end -->

    <!-- CTA Area start -->
    @include('landing-page.template.sections.cta')
    <!-- CTA Area end -->
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $('body').on('click', '.add-to-cart', function() {
                var id = $(this).data('id');
                var quantity = $(this).data('quantity');

                $.ajax({
                    url: '/add-to-cart',
                    method: 'POST',
                    data: {
                        service_id: id,
                        quantity: quantity,
                    },
                    success: function(response) {
                        Swal.fire({
                            type: "success",
                            title: response.status,
                            text: response.message,
                            confirmButtonColor: "#59C4BC",
                            confirmButtonText: "Lanjut",
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
