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
                    <h1 class="h3 mb-0 text-gray-800 fw-bold">Data Laporan Parkiran</h1>
                    @if (request()->is('report'))
                        <a href="/generate-pdf/report" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-download fa-sm text-white-50"></i>
                            Generate Report
                        </a>
                    @elseif (request()->is('report/filter'))
                        <form action="/generate-pdf/report/filter-date" method="post">
                            @csrf
                            <input type="hidden" id="startDatePdf" name="startDatePdf" value={{ $start_date_pdf }}>
                            <input type="hidden" id="endDatePdf" name="endDatePdf" value={{ $end_date_pdf }}>
                            <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                <i class="fas fa-download fa-sm text-white-50"></i>
                                Generate Report
                            </button>
                        </form>
                    @elseif (request()->is('report/filter/jenis'))
                        <form action="/generate-pdf/report/filter-jenis" method="post">
                            @csrf
                            <input type="hidden" value={{ $input_jenis }} name="jenis">
                            <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                <i class="fas fa-download fa-sm text-white-50"></i>
                                Generate Report
                            </button>
                        </form>
                    @endif
                </div>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">

                    <class class="d-flex mt-2 ms-2">
                        <form action="/report/filter" method="post" class="flex-fill">
                            @csrf
                            <div class="d-flex">
                                <div id="reportrange" class="w-50" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;">
                                    <i class="fa fa-calendar"></i>&nbsp;
                                    <span></span> <i class="fa fa-caret-down"></i>
                                </div>
                                <input type="hidden" id="startDate" name="startDate" value={{ $start_date }}>
                                <input type="hidden" id="endDate" name="endDate" value={{ $end_date }}>
                                <button type="submit" class="btn btn-primary ms-2">Search</button>
                            </div>
                        </form>

                        <form action="/report/filter/jenis" method="post" class="flex-fill">
                            @csrf
                            <div class="d-flex">
                                <select class="form-select w-50" aria-label="Default select example" name="selectJenisMotor">
                                    <option selected>Jenis Motor</option>
                                    @foreach ($jenis as $j)
                                        <option value="{{ $j->id }}">{{ $j->jenis }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary ms-2">Search</button>

                            </div>
                        </form>
                    </class>
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
                                        <th>Jenis Motor</th>
                                        <th>Biaya</th>
                                        <th>Tipe Pembayaran</th>
                                        <th>Bukti Pembayaran</th>
                                        <th>Detail</th>
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
                                        <th>Tipe Pembayaran</th>
                                        <th>Bukti Pembayaran</th>
                                        <th>Detail</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($dataMotor as $data)
                                        <tr>
                                            <td>{{ $data->motor }}</td>
                                            <td>{{ $data->plat_nomor }}</td>
                                            <td>{{ $data->properti }}</td>
                                            <td>{{ $data->jam_masuk->format('d, M:H.i') }}</td>
                                            <td>{{ $data->jam_keluar != null ? $data->jam_keluar->format('d, M:H.i') : '' }}</td>
                                            <td>{{ $data->jenis }}</td>
                                            <td>Rp. {{ number_format($data->biaya, 0, ',', '.') }}</td>
                                            <td>{{ $data->tipe_pembayaran }}</td>
                                            <td>
                                                <img src='{{ asset('storage/images/' . $data->bukti_bayar) }}' alt="" class="buktibayar"
                                                    style="width: 100px; min-height: 0; max-height: 100px; object-fit: cover;" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#imageModal" onclick="sendImageToModal('{{ asset('storage/images/' . $data->bukti_bayar) }}')"
                                                >
                                            </td>
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

<!-- Modal Image -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Bukti Transfer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="" class="img-fluid image-modal" alt="...">
            </div>
        </div>
    </div>
</div>

@endsection
