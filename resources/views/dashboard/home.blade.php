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
                <h1 class="h3 mb-2 text-gray-800">Home</h1>
                <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                    For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Parkiran</h6>
                    </div>

                    <div class="col px-4 py-3">
                        <form class="row g-3" action="/home" method="post">
                            @csrf
                            <div class="col-12 pt-2 mb-3">
                                <label for="merek-motor" class="form-label font-weight-bold">Merek Motor</label>
                                <select class="form-select" id="merekMotor" aria-label="Example select with button addon" onchange="selectMerek(event)">
                                    <option selected>Choose...</option>
                                    @foreach ($merek as $mrk)
                                        <option value={{ $mrk->id }}>{{ $mrk->merek }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="nama-motor" class="form-label font-weight-bold">Nama Motor</label>
                                <select class="form-select" id="selectNamaMotor" aria-label="Example select with button addon" onchange="selectMotor(event)">
                                    <option selected>Choose...</option>
                                    {{-- @foreach ($motor as $mtr)
                                        <option value={{ $mtr->id }}>{{ $mtr->motor }}</option>
                                    @endforeach --}}
                                </select>
                                <input type="hidden" name="" id="dataMotor" value='{{ $motor }}'>
                                {{-- <label for="motor" class="form-label font-weight-bold">Nama Motor</label>
                                <input type="text" class="form-control" id="motor" name="motor"> --}}
                            </div>
                            <div class="col-md-6">
                                <label for="platNomor" class="form-label font-weight-bold">Plat Nomor</label>
                                <input type="text" class="form-control" id="platNomor" name="platNomor">
                            </div>
                            <div class="col-12 pt-2">
                                <label for="properti" class="form-label font-weight-bold">Properti</label>
                                <input type="text" class="form-control" id="properti" placeholder="Ket. Helm" name="properti">
                            </div>
                            <div class="col-12 pt-2">
                                <label for="jenis-motor" class="form-label font-weight-bold">Jenis Motor</label>
                                <input type="text" class="form-control" id="jenisMotor" placeholder="" name="jenis-motor" readonly>
                                {{-- <select class="form-select" id="jenisMotor" aria-label="Example select with button addon" onchange="selectBox(event)">
                                    <option selected>Choose...</option>
                                    <option value="1">Motor Kecil Rp 5.000</option>
                                    <option value="2">Motor Besar Rp 7.000</option>
                                </select> --}}
                            </div>
                            <div class="col-12 pt-2">
                                <label for="biaya" class="form-label font-weight-bold">Biaya</label>
                                <input type="text" class="form-control" id="biaya" placeholder="Rp. 0" name="biaya" readonly>
                            </div>
                            <input type="text" name="tipeMotor" id="tipeMotor" class="d-none">
                            <div class="col-12 pt-3">
                                <button type="submit" class="btn btn-primary">Input</button>
                            </div>
                        </form>
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
                    <span>Copyright &copy; Your Website 2020</span>
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
