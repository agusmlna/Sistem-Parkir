@extends('layouts.main')

@section('content')

    <!-- Page Wrapper -->
    <div id="wrapper">
    @section('sidebar')
        @include('layouts.sidebar')
    @show
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            @section('topbar')
                @include('layouts.topbar')
            @show

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800 fw-bold">Struk Parkiran</h1>
                    <a href="/generate-pdf/struk/{{ $data->id }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>
                        Generate Report</a>
                </div>
                <!-- Content Row -->
                <div class="row">

                    <div class="col-8">
                        <!-- Illustrations -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 text-center">
                                <h4>{{ $date }}</h4>
                            </div>
                            <div class="row justify-content-between">
                                <div class="col-4 pl-5 ml-5 py-3">
                                    <h5>Nama Motor</h5>
                                    <h5>Plat Nomor</h5>
                                    <h5>Jam Masuk</h5>
                                    <h5>Jenis Motor</h5>
                                    <h5>Total Harga</h5>
                                </div>
                                <div class="col-4 pl-5 ml-5 py-3">
                                    <h5>{{ $data->motor }}</h5>
                                    <h5>{{ $data->plat_nomor }}</h5>
                                    <h5>{{ $data->jam_masuk->format('H.i') }}</h5>
                                    <h5>{{ $data->jenis }}</h5>
                                    <h5>{{ $data->biaya }}</h5>
                                </div>
                            </div>
                            <div class="card-header py-3 text-center">
                                <h4 class="m-0 font-weight-bold text-primary">
                                    Terima Kasih
                                </h4>
                                <h5>Penitipan motor simpati</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2021</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Ready to Leave?
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Select "Logout" below if you are ready to end your current
                session.
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">
                    Cancel
                </button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

@endsection
