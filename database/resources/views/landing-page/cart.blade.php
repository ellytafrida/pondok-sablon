@extends('landing-page.template.base')

@push('style')
    <link rel="stylesheet" href="{{ asset('assets-admin/plugins/dropify/dropify.min.css') }}">
@endpush

@section('content')
    <!-- Page Banner Start -->
    <section class="page-banner bgs-cover text-white pt-65 pb-75 mt-100"
        style="background-image: url('images/bg-login.jpeg');">
        <div class="container">
            <div class="banner-inner">
                <h2 class="page-title wow fadeInUp delay-0-2s">Keranjang Anda</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb wow fadeInUp delay-0-4s" style="background-color: #212F3C;">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Pondok Sablon</a></li>
                        <li class="breadcrumb-item active">Keranjang</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- Page Banner End -->


    <!-- Shop Page Area start -->
    <section class="shop-page-three-area py-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop-three-wrap">
                        <form id="form" action="checkout" method="POST">
                            @php
                                $total = 0;
                                $ongkir = 0;
                            @endphp
                            @forelse ($carts as $cart)
                                <input type="hidden" name="service_id[]" value="{{ $cart->service->id }}">
                                {{-- <input type="hidden" name="quantities[]" value="{{ $cart->quantity }}"> --}}
                                <div class="card mb-3 shadow">
                                    <div class="card-body product-item style-two wow fadeInUp delay-0-2s">
                                        <div class="image">
                                            <img
                                                src="{{ asset(empty($cart->service->image) ? 'images/blog-empty.jpg' : $cart->service->image) }}">
                                        </div>
                                        <div class="product-content">
                                            <h3><a
                                                    href="{{ url('services/detail', $cart->service->id) }}">{{ $cart->service->name }}</a>
                                            </h3>
                                            <div class="text-danger">Rp. {{ $cart->service->unit_price }}/buah</div>
                                            {{-- <div class="social-style-two">
                                                <p><span>Jumlah:</span> <strong>{{ $cart->quantity }} Buah</strong></p>
                                            </div> --}}
                                            <div class="social-style-two">
                                                <span>Jumlah:</span>
                                                <input type="number" name="quantities[]" value="{{ $cart->quantity }}"
                                                    min="{{ $cart->quantity }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="button" data-id="{{ $cart->id }}"
                                            class="btn btn-danger delete"><span aria-hidden="true">&times;</span>
                                            Hapus</button>
                                        <div class="float-end">Subtotal: Rp.
                                            {{ $cart->service->unit_price * $cart->quantity }}
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $total += $cart->quantity * $cart->service->unit_price;
                                @endphp
                            @empty
                                <p class="text-center">Keranjangmu masih kosong</p>
                            @endforelse
                            @if ($carts->isEmpty())
                            @else
                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label for="image">Gambar Desain<span class="text-danger">*</span>: </label>
                                            <input id="image" type="file" class="dropify" name="image"
                                                data-allowed-file-extensions="jpeg jpg png" data-max-file-size="1000K">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label for="note">Catatan (Opsional):</label>
                                            <textarea name="note" id="note" rows="6"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="float-end mt-4">Total: <span class="text-danger">Rp. {{ $total }}</span>
                                </h3>
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="total_price" value="{{ $total + $ongkir }}">
                                <button id="submit" type="submit" class="style-two mt-20" style="width: 100%;" disabled>
                                    Bayar
                                    <i class="far fa-long-arrow-right"></i>
                                </button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Page Area end -->
    @include('landing-page.template.sections.cta')
@endsection

@push('script')
    <script src="{{ asset('assets-admin/plugins/dropify/dropify.min.js') }}"></script>

    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>

    <script>
        $(document).ready(function() {
            var dropify = $("#image").dropify({
                messages: {
                    default: "",
                    replace: "Klik atau seret untuk mengubah gambar",
                    remove: "Hapus",
                    error: "Oops, Terjadi Kesalahan",
                },
            });

            dropify.on("dropify.afterClear", function() {
                $("#submit").removeClass('theme-btn').prop('disabled', true);
            });

            $("#image").change(function() {
                $("#submit").addClass('theme-btn').prop('disabled', false);
            });


            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $("#form").on("submit", function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr("action"),
                    method: $(this).attr("method"),
                    data: new FormData(this),
                    processData: false,
                    dataType: "json",
                    contentType: false,
                    beforeSend: function() {
                        $("#submit").html(
                            '<div class="text-center"><div class="spinner-border spinner-border-sm text-white"></div></div>'
                        );
                    },
                    success: function(response) {
                        console.log(response);

                        var order_id = response.order.id;
                        var user_id = response.user.id;

                        window.snap.pay(response.snapToken, {
                            onSuccess: function(result) {
                                /* You may add your own implementation here */
                                console.log(result);
                                var id = order_id;
                                $.ajax({
                                    url: 'change-order-status',
                                    method: 'POST',
                                    data: {
                                        order_id: id,
                                        user_id: user_id,
                                    },
                                    success: function(response) {
                                        console.log(response);
                                        $("#submit").html(
                                            'Bayar<i class="far fa-long-arrow-right"></i>'
                                        );
                                        Swal.fire({
                                            type: "success",
                                            title: response
                                                .status,
                                            text: response
                                                .message,
                                            confirmButtonColor: "#59C4BC",
                                            confirmButtonText: "Lanjut",
                                            backdrop: true,
                                            allowOutsideClick: () => {
                                                console.log(
                                                    "Klik Tombol Lanjut"
                                                );
                                            },
                                        }).then((result) => {
                                            if (result.value ==
                                                true) {
                                                window.location
                                                    .href = '/';
                                            }
                                        });
                                    },
                                    error: function(error) {
                                        console.log(error)
                                    }
                                })
                            },
                            onPending: function(result) {
                                /* You may add your own implementation here */
                                console.log(result);
                                Swal.fire({
                                    type: "warning",
                                    title: "Mohon Segera Dibayar",
                                    text: "Kami Masih Menunggu Pembayaranmu",
                                });
                                $("#submit").html(
                                    'Bayar<i class="far fa-long-arrow-right"></i>'
                                );
                            },
                            onError: function(result) {
                                /* You may add your own implementation here */
                                console.log(result);
                                Swal.fire({
                                    type: "error",
                                    title: "Transaksi Gagal",
                                    text: "Coba Lagi Dalam Beberapa Saat",
                                });
                                $("#submit").html(
                                    'Bayar<i class="far fa-long-arrow-right"></i>'
                                );
                            },
                            onClose: function() {
                                /* You may add your own implementation here */
                                alert(
                                    'Kamu menutup pembayaran'
                                );
                                $("#submit").html(
                                    'Bayar<i class="far fa-long-arrow-right"></i>'
                                );
                            }
                        });
                    },
                    error: function(error) {
                        console.error(error);
                    },
                });

            });

            $("body").on('click', '.delete', function() {
                $.ajax({
                    url: 'delete-to-cart',
                    method: 'POST',
                    data: {
                        id: $(this).data('id')
                    },
                    success: function(response) {
                        console.log(response);
                        Swal.fire({
                            type: "success",
                            title: response.status,
                            text: response.message,
                            confirmButtonColor: "#59C4BC",
                            confirmButtonText: "Lanjut",
                            backdrop: true,
                            allowOutsideClick: () => {
                                console.log("Klik Tombol Lanjut");
                            },
                        }).then((result) => {
                            if (result.value == true) {
                                window.location.reload();
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
