@extends('landing-page.template.base')
@section('content')
    <!-- Page Banner Start -->
    <section class="page-banner bgs-cover text-white pt-65 pb-75 mt-100"
        style="background-image: url('images/bg-login.jpeg');">
        <div class="container">
            <div class="banner-inner">
                <h2 class="page-title wow fadeInUp delay-0-2s">Lihat Pesanan</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb wow fadeInUp delay-0-4s" style="background-color: #212F3C;">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Pondok Sablon</a></li>
                        <li class="breadcrumb-item active">Lihat Pesanan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- Page Banner End -->

    <div class="card">
        <ul class="nav nav-tabs product-information-tab mb-30">
            <li><a href="#pesanan-anda" data-bs-toggle="tab" class="active show" style="font-size: 12pt;">Pesanan Anda</a>
            </li>
            <li><a href="#pesanan-diproses" data-bs-toggle="tab" style="font-size: 12pt;">Pesanan Diproses</a></li>
            <li><a href="#pesanan-dikirim" data-bs-toggle="tab" style="font-size: 12pt;">Pesanan Selesai</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active show" id="pesanan-anda">
                <div class="container">
                    <div class="shop-three-wrap">
                        @forelse ($orders->where('status', '!=' ,'Belum Dibayar') as $order)
                            <div class="card mb-3 shadow">
                                <div class="card-body fadeInUp delay-0-2s">
                                    <div class="row">
                                        <div class="col-2 text-center">
                                            <div class="image">
                                                <img src="{{ asset('favicon.png') }}" height="100">
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="product-content">
                                                @if ($order->status == 'Belum Dibayar')
                                                    <span class="badge bg-danger"
                                                        style="width: 30%; margin-bottom: 20px; margin-left: 15px">{{ $order->status }}</span>
                                                @elseif ($order->status == 'Sudah Dibayar')
                                                    <span class="badge bg-primary"
                                                        style="width: 30%; margin-bottom: 20px; margin-left: 15px">{{ $order->status }}</span>
                                                @elseif ($order->status == 'Sedang Diproses')
                                                    <span class="badge bg-dark"
                                                        style="width: 30%; margin-bottom: 20px; margin-left: 15px">{{ $order->status }}</span>
                                                @else
                                                    <span class="badge bg-success"
                                                        style="width: 30%; margin-bottom: 20px; margin-left: 15px">{{ $order->status }}</span>
                                                @endif

                                                {{-- <h3><a href="{{ url('orders/detail', $order->id) }}"> --}}
                                                <h3><a href="javascript:void(0)">
                                                        <ul>
                                                            @foreach (json_decode($order->services, true) as $service)
                                                                <li>
                                                                    -
                                                                    {{ App\Models\Service::where('id', $service['product_id'])->first()->name }}
                                                                    ({{ $service['quantity'] }} Buah)
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </a></h3>
                                                <div class="text-danger">Rp. {{ $order->total_price }}</div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <a href="{{ url('orders/invoice', $order->id) }}" class="btn btn-dark"><i
                                                    class="fa fa-print"></i> Bukti Pembayaran</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @empty
                            <p class="text-center">Tidak ada pesanan tersedia</p>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pesanan-diproses">
                <div class="container">
                    <div class="shop-three-wrap">
                        @forelse ($orders->where('status', '==' ,'Sedang Diproses') as $order)
                            <div class="card mb-3 shadow">
                                <div class="card-body product-item style-two fadeInUp delay-0-2s">
                                    <div class="image">
                                        <img src="{{ asset('favicon.png') }}" height="100">
                                    </div>
                                    <div class="product-content">
                                        <div class="row">
                                            <span class="badge bg-dark"
                                                style="width: 30%; margin-bottom: 20px; margin-left: 15px">{{ $order->status }}</span>

                                            {{-- <h3><a href="{{ url('orders/detail', $order->id) }}"> --}}
                                            <h3><a href="javascript:void(0)">
                                                    <ul>
                                                        @foreach (json_decode($order->services, true) as $service)
                                                            <li>
                                                                -
                                                                {{ App\Models\Service::where('id', $service['product_id'])->first()->name }}
                                                                ({{ $service['quantity'] }} Buah)
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </a></h3>
                                            <div class="text-danger">Rp. {{ $order->total_price }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-center">Tidak ada pesanan yang sedang diproses</p>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pesanan-dikirim">
                <div class="container">
                    <div class="shop-three-wrap">
                        @forelse ($orders->where('status', '==' ,'Selesai') as $order)
                            <div class="card mb-3 shadow">
                                <div class="card-body product-item style-two fadeInUp delay-0-2s">
                                    <div class="image">
                                        <img src="{{ asset('favicon.png') }}" height="100">
                                    </div>
                                    <div class="product-content">
                                        <span class="badge bg-success"
                                            style="width: 30%; margin-bottom: 20px; margin-left: 15px">{{ $order->status }}</span>

                                        {{-- <h3><a href="{{ url('orders/detail', $order->id) }}"> --}}
                                        <h3><a href="javascript:void(0)">
                                                <ul>
                                                    @foreach (json_decode($order->services, true) as $service)
                                                        <li>
                                                            -
                                                            {{ App\Models\Service::where('id', $service['product_id'])->first()->name }}
                                                            ({{ $service['quantity'] }} Buah)
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </a></h3>
                                        <div class="text-danger">Rp. {{ $order->total_price }}</div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-center">Tidak ada pesanan yang telah selesai</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
