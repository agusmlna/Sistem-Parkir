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
                    <h1 class="h3 mb-2 text-gray-800">Data Motor</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
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
                                            <th>Detail</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($dataMotor as $data)
                                        <tr>
                                            <td>{{ $data->plat_nomor }}</td>
                                            <td>{{ $data->properti }}</td>
                                            <td>{{ $data->jam_masuk->format('H.i') }}</td>
                                            <td>{{  $data->jam_keluar != null ? $data->jam_keluar->format('H.i') : '' }}</td>
                                            <td>{{ $data->tipe_motor }}</td>
                                            <td>Rp. {{ $data->biaya }}</td>
                                            <td>
                                                @if ($data->status == 'diproses')
                                                    <span class="badge rounded-pill text-bg-primary">Proses</span>
                                                @elseif($data->status == 'selesai' )
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
