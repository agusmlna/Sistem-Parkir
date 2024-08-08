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
                <!-- error message untuk komplain -->
                @error('inputKomplainProperti')
                    @include('layouts.alert', [
                        'type' => 'danger',
                        'message' => $message,
                    ])
                @enderror

                <!-- error message untuk edit -->
                @error('merek')
                    @include('layouts.alert', [
                        'type' => 'danger',
                        'message' => $message,
                    ])
                @enderror
                @error('motor')
                    @include('layouts.alert', [
                        'type' => 'danger',
                        'message' => $message,
                    ])
                @enderror
                @error('platNomor')
                    @include('layouts.alert', [
                        'type' => 'danger',
                        'message' => $message,
                    ])
                @enderror

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Data Parkir</h1>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
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
                                            <td>Rp. {{ number_format($data->biaya, 0, ',', '.') }}</td>
                                            <td>
                                                @if ($data->status == 'diproses')
                                                    <span class="badge text-bg-primary"> Proses
                                                    </span>
                                                @elseif($data->status == 'selesai')
                                                    <span class="badge text-bg-success"> Selesai
                                                    </span>
                                                @elseif($data->status == 'dibatalkan')
                                                    <span class="badge text-bg-danger"> Dibatalkan
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($data->status != 'selesai' && $data->status != 'dibatalkan')
                                                    @if (session('role') == 'admin')
                                                        <button type="button" class="btn btn-primary rounded-circle btn-sm" data-bs-toggle="modal" data-bs-target="#selesaiParkir"
                                                            onclick="dataToModal({{ $data->id }})"
                                                        >
                                                            <i class="fas fa-qrcode"></i>
                                                        </button>
                                                        <a class="btn btn-primary rounded-circle btn-sm" href='/data-parkir/cash/{{ $data->id }}'>
                                                            <i class="fas fa-money-bill"></i>
                                                        </a>
                                                        <button type="button" class="btn btn-primary rounded-circle btn-sm" data-bs-toggle="modal" data-bs-target="#editParkir"
                                                            onclick="editModal({{ $data }})"
                                                        >
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                    @endif
                                                    @if (session('role') == 'owner')
                                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                            onclick="dataToModal({{ $data->id }})"
                                                        >
                                                            Batalkan
                                                        </button>
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                                @if ($data->id_komplain != null)
                                                    <button type="button" class="btn btn-warning" disabled>
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

{{-- Modal open webcam --}}
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
                <canvas id="canvasElement" style="display: none;"></canvas>
                <img id="photoElement" style="display: none;">
                <div>
                    <button id="startButton">Start Webcam</button>
                    <button id="captureButton" disabled>Capture Photo</button>
                </div>

            </div>
            <div class="modal-footer">
                <form onsubmit="return submitBuktiBayar(this)" method="post" id="form" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input type="file" id="buktiBayar" name="bukti-bayar" hidden>
                    <button type="reset" id="closeWebcamButton" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="submitWebcamButton" class="btn btn-primary" disabled>Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal komplain -->
<div class="modal fade" id="komplainParkir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Komplain</h1>
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
                        <input type="text" class="form-control" id="inputKomplainProperti" placeholder="Kehilangan Helm" name="inputKomplainProperti"
                            @error('inputKomplainProperti') is-invalid @enderror
                        >
                        @error('inputKomplainProperti')
                            @include('layouts.alert', [
                                'type' => 'danger',
                                'message' => $message,
                            ])
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal komplain -->
{{-- <div class="modal fade" id="komplainParkir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
</div> --}}

{{-- Cancel modal --}}
<div id="deleteModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header flex-column">
                <div class="icon-box">
                    <i class="material-icons">&times;</i>
                </div>
                <h4 class="modal-title w-100">Are you sure?</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Do you really want to Cancel these records? This process cannot be undone.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form onsubmit="return submitCancelParkir(this)" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- modal edit Parkir --}}
<div class="modal fade" id="editParkir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Edit Data Parkir</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form class="row g-3" onsubmit="return onSubmitEditParkir(this)" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" name="" id="dataMotorEdit" value='{{ $motorForEdit }}'>

                    <div class="col-12 pt-2 mb-3">
                        <label for="merek-motor" class="form-label font-weight-bold">Merek Motor</label>
                        <select class="form-select" id="merekMotor" aria-label="Example select with button addon" name="merek" @error('merek') is-invalid @enderror
                            onchange="selectMerekEdit(event)"
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
                        <select class="form-select" id="selectNamaMotorEdit" name="motor" aria-label="Example select with button addon" @error('motor') is-invalid @enderror
                            onchange="selectMotorEdit(event)"
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

                    <input type="text" name="tipeMotor" id="tipeMotor" class="d-none">

                    <div class="row mb-3 pt-3">
                        <div class="col-sm-10 offset-sm-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="checkBoxEditMotor" onclick="confirmEditParkir()">
                                <label class="form-check-label" for="checkBoxEditMotor">
                                    setuju?
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btnEditParkir" disabled>Submit</button>
                </div>
            </form>

            <!-- </form> -->
        </div>
    </div>
</div>
</div>

@endsection
