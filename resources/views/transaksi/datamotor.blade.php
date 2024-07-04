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
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Motor</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Motor</th>
                                        <th>Plat Nomor</th>
                                        <th>Properti</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Keluar</th>
                                        <th>Tipe Motor</th>
                                        <th>Biaya</th>
                                        <th>Detail</th>
                                        <th>Aksi</th>
                                        <th>Komplain</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Motor</th>
                                        <th>Plat Nomor</th>
                                        <th>Properti</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Keluar</th>
                                        <th>Jenis Motor</th>
                                        <th>Biaya</th>
                                        <th>Detail</th>
                                        <th>Aksi</th>
                                        <th>Komplain</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($dataMotor as $data)
                                        <tr>
                                            <td>{{ $data->motor }}</td>
                                            <td>{{ $data->plat_nomor }}</td>
                                            <td>{{ $data->properti }}</td>
                                            <td>{{ $data->jam_masuk->format('H.i') }}</td>
                                            <td>{{ $data->jam_keluar != null ? $data->jam_keluar->format('H.i') : '' }}
                                            </td>
                                            <td>{{ $data->jenis }}</td>
                                            <td>Rp. {{ $data->biaya }}</td>
                                            <td>
                                                @if ($data->status == 'diproses')
                                                    <span class ="badge text-bg-primary"> Proses
                                                    </span>
                                                @elseif($data->status == 'selesai')
                                                    <span class ="badge text-bg-success"> Selesai
                                                    </span>
                                                @elseif($data->status == 'delete')
                                                    <span class="badge text-bg-danger"> Dibatalkan
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($data->status != 'selesai')
                                                    <button type="button" class="btn btn-primary rounded-circle btn-sm" data-bs-toggle="modal" data-bs-target="#selesaiParkir"
                                                        onclick="dataToModal({{ $data->id }})"
                                                    >
                                                        <i class="fas fa-qrcode"></i>
                                                    </button>
                                                    <a class="btn btn-primary rounded-circle btn-sm" href='/data-motor/cash/{{ $data->id }}'>
                                                        <i class="fas fa-money-bill"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-danger rounded-circle btn-sm" data-bs-toggle="modal" data-bs-target=" ">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($data->id_komplain != null)
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#komplainParkir"
                                                        onclick='dataToModalComplain({{ $data }})' disabled
                                                    >
                                                        Komplain
                                                    </button>
                                                @endif
                                                @if ($data->id_komplain == null)
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#komplainParkir"
                                                        onclick='dataToModalComplain({{ $data }})'
                                                    >
                                                        Komplain
                                                    </button>
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

{{-- Modal selesai parkir --}}
<div class="modal fade" id="selesaiParkir" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Pegawai</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h1>Webcam Capture</h1>
                <video id="videoElement" autoplay></video>
                <button id="startButton">Start Webcam</button>
                <button id="captureButton">Capture Photo</button>
                <canvas id="canvasElement" style="display: none;"></canvas>
                <img id="photoElement" style="display: none;">

            </div>
            <div class="modal-footer">
                <form onsubmit="return submitBuktiBayar(this)" method="post" id="form" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input type="file" id="buktiBayar" name="bukti-bayar" hidden>
                    <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

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

<!-- Modal komplain -->
<div class="modal fade" id="komplainParkir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form onsubmit="return submitKomplain(this)" class="row g-3" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="col-md-6">
                        <label for="motor" class="form-label font-weight-bold">Motor</label>
                        <input type="text" class="form-control" id="inputKomplainMotor" name="motor" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="platNomor" class="form-label font-weight-bold">Plat Nomor</label>
                        <input type="text" class="form-control" id="inputKomplainPlatNomor" name="platNomor" disabled>
                    </div>
                    <div class="col-12 pt-2">
                        <label for="kategori" class="form-label font-weight-bold">Kategori</label>
                        <select class="form-select" id="inputKomplainJenisMotor" aria-label="Example select with button addon" disabled>
                            <option selected>Choose...</option>
                            <option value="1">Motor Kecil </option>
                            <option value="2">Motor Gede </option>
                        </select>
                        {{-- <input type="text" name="inputKomplainTipeMotor" id="tipeMotor" class="d-none" >  --}}
                    </div>
                    <div class="col-12 pt-2">
                        <label for="properti" class="form-label font-weight-bold">Keterangan</label>
                        <input type="text" class="form-control" id="inputKomplainProperti" placeholder="Kehilangan Pacar" name="inputKomplainProperti">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal komplain -->
<div class="modal fade" id="komplainParkir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    Input Data Motor</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="/home" method="post">
                    @csrf
                    <div class="col-md-6">
                        <label for="inputKomplainMotor" class="form-label font-weight-bold">Motor</label>
                        <input type="text" class="form-control" id="inputKomplainMotor" name="inputKomplainMotor">
                    </div>
                    <div class="col-md-6">
                        <label for="inputKomplainPlatNomor" class="form-label font-weight-bold">Plat
                            Nomor</label>
                        <input type="text" class="form-control" id="inputKomplainPlatNomor" name="inputKomplainPlatNomor">
                    </div>
                    <div class="col-12 pt-2">
                        <label for="properti" class="form-label font-weight-bold">Keterangan</label>
                        <input type="text" class="form-control" id="properti" placeholder="Kehilangan Pacar" name="keterangan">
                    </div>
                    <div class="col-12 pt-2">
                        <label for="inputKomplainJenisMotor" class="form-label font-weight-bold">JenisMotor</label>
                        <select class="form-select" id="inputKomplainJenisMotor" aria-label="Example select with button addon" onchange="selectBox(event)" name='inputKomplainJenisMotor'>
                            <option selected>Choose...</option>
                            <option value="1">Motor Kecil </option>
                            <option value="2">Motor Besar </option>
                        </select>
                    </div>
                    <input type="text" name="tipeMotor" id="tipeMotor" class="d-none">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save
                    changes</button>
            </div>
        </div>
    </div>
</div>

@endsection
