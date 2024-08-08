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

            <!-- Topbar -->
            @section('topbar')
                @include('layouts.topbar')
            @show
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                @error('inputGantiRugi')
                    @include('layouts.alert', [
                        'type' => 'danger',
                        'message' => $message,
                    ])
                @enderror

                @error('inputBiaya')
                    @include('layouts.alert', [
                        'type' => 'danger',
                        'message' => $message,
                    ])
                @enderror

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800 fw-bold">Data Komplain</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Plat Nomor</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Keluar</th>
                                        <th>Tipe Motor</th>
                                        <th>Keterangan</th>
                                        <th>Biaya Ganti Rugi</th>
                                        <th>Detail</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Plat Nomor</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Keluar</th>
                                        <th>Tipe Motor</th>
                                        <th>Keterangan</th>
                                        <th>Biaya Ganti Rugi</th>
                                        <th>Detail</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp

                                    @foreach ($komplain as $k)
                                        @php
                                            $i++;
                                        @endphp
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $k->plat_nomor }}</td>
                                            <td>{{ $k->jam_masuk->format('H.i') }}</td>
                                            <td>{{ $k->jam_keluar != null ? $k->jam_keluar->format('H.i') : '' }}</td>
                                            <td>{{ $k->jenis }}</td>
                                            <td>{{ $k->komplain }}</td>
                                            <td>Rp. {{ number_format($k->biaya_ganti_rugi, 0, ',', '.') }}</td>
                                            <td>
                                                @if ($k->status == 'diproses')
                                                    <span class="badge rounded-pill text-bg-primary">Proses</span>
                                                @elseif($k->status == 'selesai')
                                                    <span class="badge rounded-pill text-bg-success">Selesai</span>
                                                @elseif($k->status == 'delete')
                                                    <span class="badge rounded-pill text-bg-danger">Dibatalkan</span>
                                                @endif
                                            </td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#gantiRugi"
                                                    onclick="openModalGantiRugi({{ $k }}); takeIdKomplain({{ $k->id_komplain }})"
                                                    {{ $k->status == 'selesai' || $k->status == 'delete' ? 'disabled' : '' }}
                                                >
                                                    Ganti Rugi
                                                </button>


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

<!-- Modal -->
<div class="modal fade" id="gantiRugi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Biaya Ganti Rugi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form onsubmit="return submitGantiRugi(this)" method="post">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="inputGantiRugi" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="inputGantiRugi" name="inputGantiRugi" aria-describedby="gantiHelp" @error('inputGantiRugi') is-invalid @enderror>
                        <div id="gantiHelp" class="form-text">Masukan Keterangan.</div>
                        @error('inputGantiRugi')
                            @include('layouts.alert', [
                                'type' => 'danger',
                                'message' => $message,
                            ])
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputBiaya" class="form-label">Biaya</label>
                        <input type="number" class="form-control" id="inputBiaya" name="inputBiaya" aria-describedby="gantiHelp" @error('inputBiaya') is-invalid @enderror>
                        <div id="gantiHelp" class="form-text">Masukan Biaya.</div>
                        @error('inputBiaya')
                            @include('layouts.alert', [
                                'type' => 'danger',
                                'message' => $message,
                            ])
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
