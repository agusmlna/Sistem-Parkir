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
                {{-- alert --}}
                @if (session()->get('message'))
                    @include('layouts.alert', ['type' => session()->get('type'), 'message' => session()->get('message')])
                @endif


                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Data Motor</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Isi Inputan Motor</h6>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Tambah Data Motor
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Motor</th>
                                        <th>Merek Motor</th>
                                        <th>Jenis Motor</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Motor</th>
                                        <th>Merek Motor</th>
                                        <th>Jenis Motor</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($motor as $mtr)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td> {{ $mtr->motor }} </td>
                                            <td> {{ $mtr->merek }} </td>
                                            <td> {{ $mtr->jenis }} </td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editMotor"
                                                    onclick="openModalEditMotor({{ $mtr }}); takeIdMotor({{ $mtr->id }})"
                                                >
                                                    edit
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="takeIdMotor({{ $mtr->id }})">
                                                    Hapus
                                                </button>
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


<!-- Add Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Motor</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/motor" method="post">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputNamaMotor" class="col-sm-2 col-form-label">Nama Motor</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputNamaMotor" name="inputNamaMotor">
                        </div>
                    </div>
                    <div class="col-12 pt-2 mb-3">
                        <label for="merek-motor" class="form-label font-weight-bold">Merek Motor</label>
                        <select class="form-select" id="merekMotor" aria-label="Example select with button addon" name="inputMerek">
                            <option selected>Choose...</option>
                            @foreach ($merek as $m)
                                <option value={{ $m->id }}>{{ $m->merek }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 pt-2">
                        <label for="jenis-motor" class="form-label font-weight-bold">Jenis Motor</label>
                        <select class="form-select" id="jenisMotor" name="inputJenis" aria-label="Example select with button addon" onchange="selectBox(event)">
                            <option selected>Choose...</option>
                            @foreach ($jenis as $j)
                                <option value={{ $j->id }}>{{ $j->jenis }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="col-12 pt-2">
                        <label for="input-biaya" class="form-label font-weight-bold">Biaya</label>
                        <input type="text" class="form-control" id="inputBiaya" placeholder="0" name="input-biaya" readonly>
                    </div> --}}
                    <div class="row mb-3">
                        <div class="col-sm-10 offset-sm-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck1">
                                <label class="form-check-label" for="gridCheck1">
                                    Example checkbox
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Edit Modal -->
<div class="modal fade" id="editMotor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Edit Data Motor</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form onsubmit="return submitEditMotor(this)" method="post">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="inputEditNamaMotor" class="col-form-label fw-bold">Nama Motor</label>
                            <input type="text" class="form-control" id="inputEditNamaMotor" name="inputEditNamaMotor">
                        </div>

                        <div class="col-12 pt-2 mb-3">
                            <label for="merek-motor" class="form-label font-weight-bold">Merek Motor</label>
                            <select class="form-select" id="selectEditMerek" aria-label="Example select with button addon" name="selectEditMerek">
                                <option selected>Choose...</option>
                                @foreach ($merek as $m)
                                    <option value={{ $m->id }}>{{ $m->merek }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 pt-2">
                            <label for="jenis-motor" class="form-label font-weight-bold">Jenis Motor</label>
                            <select class="form-select" id="selectEditJenis" name="selectEditJenis" aria-label="Example select with button addon" onchange="selectBox(event)">
                                <option selected>Choose...</option>
                                @foreach ($jenis as $j)
                                    <option value={{ $j->id }}>{{ $j->jenis }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- <div class="col-12 pt-2">
                        <label for="input-biaya" class="form-label font-weight-bold">Biaya</label>
                        <input type="text" class="form-control" id="inputBiaya" placeholder="0" name="input-biaya" readonly>
                    </div> --}}
                    <div class="row mb-3 pt-3">
                        <div class="col-sm-10 offset-sm-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="checkBoxEditMotor" onclick="confirmEditMotor()">
                                <label class="form-check-label" for="checkBoxEditMotor">
                                    setuju?
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btnEditMotor">Submit</button>
                    </div>
                    <!-- </form> -->
                </div>
            </form>
        </div>
    </div>
</div>

{{-- delete modal --}}
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
                <p>Do you really want to delete these records? This process cannot be undone.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form onsubmit="return submitDeleteMotor(this)" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
