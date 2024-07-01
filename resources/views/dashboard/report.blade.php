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
                <h1 class="h3 mb-2 text-gray-800">Data Laporan</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Laporan Parkiran</h6>
                    </div>

                    <form action="" method="post" class="container mt-2 ms-2">
                        <div class="row">
                            <div id="reportrange" class="col-4" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;">
                                <i class="fa fa-calendar"></i>&nbsp;
                                <span></span> <i class="fa fa-caret-down"></i>
                            </div>
                            <input type="hidden" id="startDate" name="start-date">
                            <input type="hidden" id="endDate" name="end-date">
                            <button type="submit" class="btn btn-primary col-1 ms-2">Search</button>
                        </div>

                    </form>
                    <!-- <div class="col-md-5 mt-3">
                                <div class="col">
                                    <div class="row">
                                        <label for="tanggal-2" class="col-3 col-form-label">Date</label>
                                        <div class="col-5 pb-3">
                                            <div class="input-group date" id="datepicker-2">
                                                <input type="text" class="form-control" id="inputTanggal-2" name="tanggal-2" />
                                                <span class="input-group-append">
                                                    <span class="input-group-text bg-light d-block">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <label for="tanggal-2" class="col-3 col-form-label">S/D</label>
                                        <div class="col-5 pb-3">
                                            <div class="input-group date" id="datepicker-2">
                                                <input type="text" class="form-control" id="inputTanggal-2" name="tanggal-2" />
                                                <span class="input-group-append">
                                                    <span class="input-group-text bg-light d-block">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                                        <button class="btn btn-primary me-md-1 ml-2" type="submit"><i class="fa-solid fa-filter"></i>Filter</button>
                                        <button type="reset" class="btn btn-outline-dark">Reset</button>
                                            <a
                                                href="/generate-pdf"
                                                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                                                ><i class="fas fa-download fa-sm text-white-50"></i>
                                                Generate Report</a
                                            >
                                    </div>
                                </div>
                            </div>
                        </div>  -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Plat Nomor</th>
                                        <th>Properti</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Keluar</th>
                                        <th>Tipe Motor</th>
                                        <th>Biaya</th>
                                        <th>Tipe Pembayaran</th>
                                        <th>Bukti Pembayaran</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Plat Nomor</th>
                                        <th>Properti</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Keluar</th>
                                        <th>Tipe Motor</th>
                                        <th>Biaya</th>
                                        <th>Tipe Pembayaran</th>
                                        <th>Bukti Pembayaran</th>
                                        <th>Detail</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($dataMotor as $data)
                                        <tr>
                                            <td>{{ $data->plat_nomor }}</td>
                                            <td>{{ $data->properti }}</td>
                                            <td>{{ $data->jam_masuk->format('H.i') }}</td>
                                            <td>{{ $data->jam_keluar != null ? $data->jam_keluar->format('H.i') : '' }}</td>
                                            <td>{{ $data->tipe_motor }}</td>
                                            <td>Rp. {{ $data->biaya }}</td>
                                            <td>Cash</td>
                                            <td><img src="" alt=""></td>
                                            <td>
                                                @if ($data->status == 'diproses')
                                                    <span class="badge rounded-pill text-bg-primary">Proses</span>
                                                @elseif($data->status == 'selesai')
                                                    <span class="badge rounded-pill text-bg-success">Selesai</span>
                                                @elseif($data->status == 'delete')
                                                    <span class="badge rounded-pill text-bg-danger">Dibatalkan</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
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
                    <span>Copyright &copy; SI Parkir 2024</span>
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
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

@endsection
