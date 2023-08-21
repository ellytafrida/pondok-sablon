@extends('admin.template.base')

@push('style')
    <!-- Plugins css -->
    <link href="{{ asset('assets-admin/plugins/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets-admin/plugins/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets-admin/plugins/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets-admin/plugins/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    @include('admin.user.form-modal')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Data Pengguna</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Master Data</a></li>
                                <li class="breadcrumb-item active">Data Pengguna</li>
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
                            <button id="create" class="btn btn-sm btn-dark float-right">Tambah</button>
                            <table id="table" class="table dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No. Handphone</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No. Handphone</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->
        </div> <!-- container-fluid -->
    </div>
@endsection

@push('script')
    <!-- third party js -->
    <script src="{{ 'assets-admin/plugins/datatables/jquery.dataTables.min.js' }}"></script>
    <script src="{{ 'assets-admin/plugins/datatables/dataTables.bootstrap4.js' }}"></script>
    <script src="{{ 'assets-admin/plugins/datatables/dataTables.responsive.min.js' }}"></script>
    <script src="{{ 'assets-admin/plugins/datatables/responsive.bootstrap4.min.js' }}"></script>
    <script src="{{ 'assets-admin/plugins/datatables/dataTables.buttons.min.js' }}"></script>
    <script src="{{ 'assets-admin/plugins/datatables/buttons.bootstrap4.min.js' }}"></script>
    <script src="{{ 'assets-admin/plugins/datatables/buttons.html5.min.js' }}"></script>
    <script src="{{ 'assets-admin/plugins/datatables/buttons.flash.min.js' }}"></script>
    <script src="{{ 'assets-admin/plugins/datatables/buttons.print.min.js' }}"></script>
    <script src="{{ 'assets-admin/plugins/datatables/dataTables.keyTable.min.js' }}"></script>
    <script src="{{ 'assets-admin/plugins/datatables/dataTables.select.min.js' }}"></script>
    <script src="{{ 'assets-admin/plugins/datatables/pdfmake.min.js' }}"></script>
    <script src="{{ 'assets-admin/plugins/datatables/vfs_fonts.js' }}"></script>
    <!-- third party js ends -->

    <script type="text/javascript" src="{{ asset('js/user-admin.js') }}"></script>
@endpush
