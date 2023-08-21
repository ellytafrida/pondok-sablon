@extends('admin.template.base')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Lihat Produk Layanan</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Master Data</a></li>
                                <li class="breadcrumb-item"><a href="{{ url('blogs') }}">Data Blog</a></li>
                                <li class="breadcrumb-item active">Lihat</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="px-5 py-2 text-center">
                            <img src="{{ asset(empty($service->image) ? 'images/blog-empty.jpg' : $service->image) }}">
                        </div>
                        <div class="card-body">
                            <h3>{{ $service->name }}</h3>
                            <p>Minimal Pesan : {{ $service->minimum_order }} Buah</p>
                            <p>Harga Satuan : Rp. {{ $service->unit_price }}/Buah</p>
                            <p>Kategori : {{ $service->category->category }}</p>
                            <p>Dibuat Pada : {{ $service->created_at }}</p>
                            <p>Diedit Pada : {{ $service->updated_at }}</p>
                            <hr>

                            <div class="mt-2">
                                {!! nl2br($service->description) !!}
                            </div>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->
        </div> <!-- container-fluid -->
    </div>
@endsection
