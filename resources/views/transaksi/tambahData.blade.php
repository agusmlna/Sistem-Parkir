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
                <h1 class="h3 mb-2 text-gray-800 fw-bold">Tambah Data Parkiran</h1>
                <p class="mb-4">Penginputan data parkiran motor</p>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Parkiran</h6>
                    </div>

                    <div class="col px-4 py-3">
                        <form class="row g-3" action="/tambah-data-parkir" method="post">
                            @csrf
                            <input type="hidden" name="" id="dataMotor" value='{{ $motor }}'>

                            <div class="col-12 pt-2 mb-3">
                                <label for="merek-motor" class="form-label font-weight-bold">Merek Motor</label>
                                <select class="form-select" id="merekMotor" aria-label="Example select with button addon" name="merek" @error('merek') is-invalid @enderror
                                    onchange="selectMerek(event)"
                                >
                                    <option selected value="0">Choose...</option>
                                    @foreach ($merek as $mrk)
                                        <option value={{ $mrk->id }}>{{ $mrk->merek }}</option>
                                    @endforeach
                                </select>
                                @error('merek')
                                    @include('layouts.alert', [
                                        'type' => 'danger',
                                        'message' => $message,
                                    ])
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="nama-motor" class="form-label font-weight-bold">Nama Motor</label>
                                <select class="form-select" id="selectNamaMotor" name="motor" aria-label="Example select with button addon" @error('motor') is-invalid @enderror
                                    onchange="selectMotor(event)"
                                >
                                    <option selected value="0">Choose...</option>
                                    {{-- @foreach ($motor as $mtr)
                                        <option value={{ $mtr->id }}>{{ $mtr->motor }}</option>
                                    @endforeach --}}
                                </select>
                                @error('motor')
                                    @include('layouts.alert', [
                                        'type' => 'danger',
                                        'message' => $message,
                                    ])
                                @enderror
                                <input type="hidden" name="idMotor" id="idMotor">
                                {{-- <label for="motor" class="form-label font-weight-bold">Nama Motor</label>
                                <input type="text" class="form-control" id="motor" name="motor"> --}}
                            </div>
                            <div class="col-md-6">
                                <label for="platNomor" class="form-label font-weight-bold">Plat Nomor</label>
                                <input type="text" class="form-control" id="platNomor" name="platNomor" @error('platNomor') is-invalid @enderror>
                                @error('platNomor')
                                    @include('layouts.alert', [
                                        'type' => 'danger',
                                        'message' => $message,
                                    ])
                                @enderror
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


@endsection
