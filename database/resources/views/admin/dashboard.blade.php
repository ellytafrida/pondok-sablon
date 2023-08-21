@extends('admin.template.base')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Beranda</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Menu Admin</a></li>
                                <li class="breadcrumb-item active">Beranda</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-4">
                                <h5 class="card-title mb-0">Jumlah Pesanan</h5>
                            </div>
                            <div class="row d-flex align-items-center mb-4">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                        {{ $orders_count }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <!--end card body-->
                    </div><!-- end card-->
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-4">
                                <h5 class="card-title mb-0">Jumlah Blog</h5>
                            </div>
                            <div class="row d-flex align-items-center mb-4">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                        {{ $blogs_count }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <!--end card body-->
                    </div><!-- end card-->
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-4">
                                <h5 class="card-title mb-0">Jumlah Testimoni</h5>
                            </div>
                            <div class="row d-flex align-items-center mb-4">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                        {{ $testimonies_count }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <!--end card body-->
                    </div><!-- end card-->
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-4">
                                <h5 class="card-title mb-0">Jumlah Pengguna</h5>
                            </div>
                            <div class="row d-flex align-items-center mb-4">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                        {{ $users_count }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <!--end card body-->
                    </div><!-- end card-->
                </div>
            </div>
        </div>
    </div>
@endsection
