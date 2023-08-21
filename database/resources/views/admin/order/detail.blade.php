@extends('admin.template.base')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Detail Pesanan</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Master Data</a></li>
                                <li class="breadcrumb-item">Data Pesanan</li>
                                <li class="breadcrumb-item active">Detail</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <p>Pemesan :</p>
                                </div>
                                <div class="col-4">
                                    <p>Gambar Desain : <a href="{{ asset($order->image) }}" class="btn btn-sm btn-dark" download><i
                                                class="fa fa-download"></i></a></p>
                                </div>
                                <div class="coo">
                                    <p>Status :</p>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-6 d-flex">
                                    <div class="mx-2">
                                        <img src="{{ asset(empty($user->photo) ? 'images/default-photos.png' : $user->photo) }}"
                                            height="100">

                                    </div>
                                    <div class="mx-2">
                                        <p>Nama: <strong>{{ $user->name }}</strong></p>
                                        <p>No. Handphone: <strong>{{ $user->phone_number }}</strong></p>
                                        <p>Catatan: <strong>{{ empty($order->note) ? '-' : $order->note }}</strong></p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <img src="{{ asset($order->image) }}" class="img-fluid">
                                </div>
                                <div class="col-2">
                                    @if ($order->status == 'Belum Dibayar')
                                        <span class="badge badge-danger">{{ $order->status }}</span>
                                    @elseif ($order->status == 'Sudah Dibayar')
                                        <span class="badge badge-primary">{{ $order->status }}</span>
                                    @elseif ($order->status == 'Sedang Diproses')
                                        <span class="badge badge-dark">{{ $order->status }}</span>
                                    @else
                                        <span class="badge badge-success">{{ $order->status }}</span>
                                    @endif
                                </div>

                            </div>

                            <p>Produk Yang Dipesan :</p>
                            <table id="table" class="table dt-responsive nowrap">
                                <thead>
                                    <th>Nama Produk</th>
                                    <th>Harga Satuan</th>
                                    <th>Jumlah</th>
                                    <th>Subtotal</th>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach (json_decode($order->services, true) as $service)
                                        <tr>
                                            <td>
                                                {{ App\Models\Service::where('id', $service['product_id'])->first()->name }}
                                            </td>
                                            <td>
                                                Rp.
                                                {{ App\Models\Service::where('id', $service['product_id'])->first()->unit_price }}/Buah
                                            </td>
                                            <td>
                                                {{ $service['quantity'] }} Buah
                                            </td>
                                            <td>
                                                Rp.
                                                {{ str_replace(',', '.', number_format(App\Models\Service::where('id', $service['product_id'])->first()->unit_price * $service['quantity'])) }}
                                            </td>
                                        </tr>
                                        @php
                                            $total += App\Models\Service::where('id', $service['product_id'])->first()->unit_price * $service['quantity'];
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                            <p class="mt-4">Dipesan pada: {{ $order->created_at }}</p>
                            <h3 class="float-right">
                                Total = Rp. {{ str_replace(',', '.', number_format($total)) }}
                            </h3>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->
        </div> <!-- container-fluid -->
    </div>
@endsection
