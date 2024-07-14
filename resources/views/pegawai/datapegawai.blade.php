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
                @if (session()->get('message'))
                    @include('layouts.alert', ['type' => session()->get('type'), 'message' => session()->get('message')])
                @endif

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Data Pegawai</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Isi Data Pegawai</h6>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Tambah Data Pegawai
                        </button>


                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Nama Pegawai</th>
                                        <th>Tempat, Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>No. Handphone</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Nama Pegawai</th>
                                        <th>Tempat, Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>No. Handphone</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($pegawai as $p)
                                        @php
                                            $i++;
                                        @endphp
                                        <tr>
                                            <td>{{ $i }}</td>
                                            @if ($p->foto != '')
                                                <td>
                                                    <img src='{{ asset('storage/images/' . $p->foto) }}' alt="" style="width: 100px; min-height: 0; max-height: 100px; object-fit: cover;"
                                                        type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userFotoModal"
                                                        onclick="modalUserFoto('{{ asset('storage/images/' . $p->foto) }}')"
                                                    >
                                                </td>
                                            @else
                                                <td></td>
                                            @endif
                                            <td>{{ $p->name }}</td>
                                            <td>{{ $p->tempat_tanggal_lahir }}</td>
                                            <td>{{ $p->jenis_kelamin }}</td>
                                            <td>{{ $p->alamat }}</td>
                                            <td>{{ $p->no_handphone }}</td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editPegawai"
                                                    onclick="openModalEditPegawai({{ $p }}); takeIdPegawai({{ $p->id }})"
                                                >
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="takeIdPegawai({{ $p->id }})">
                                                    Hapus
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
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Pegawai</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/data-pegawai" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputFoto" class="form-label">Upload Foto</label>
                        <input class="form-control" type="file" id="inputFoto" name="inputFoto">
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail" name="inputEmail">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword" name="inputPassword">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" name="inputName">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputTTL" class="col-sm-2 col-form-label">Tempat, Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputTTL" name="inputTTL">
                        </div>
                    </div>
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenisKelamin" id="jenisKelamin1" value="pria" checked>
                                <label class="form-check-label" for="jenisKelamin1">
                                    Pria
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenisKelamin" id="jenisKelamin2" value="wanita">
                                <label class="form-check-label" for="jenisKelamin2">
                                    Wanita
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    <div class="row mb-3">
                        <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputAlamat" name="inputAlamat">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNoHP" class="col-sm-2 col-form-label">No. Handphone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputNoHP" name="inputNoHP">
                        </div>
                    </div>
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Role</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role" id="role1" value="admin" checked>
                                <label class="form-check-label" for="role1">
                                    Admin
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role" id="role2" value="owner">
                                <label class="form-check-label" for="role2">
                                    Owner
                                </label>
                            </div>
                        </div>
                    </fieldset>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editPegawai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Pegawai</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form onsubmit="return submitEditPegawai(this)" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="formFile" class="form-label">Upload Foto</label>
                        <input class="form-control" type="file" id="formFile" name="editFoto">
                    </div>
                    <div class="row mb-3">
                        <label for="inputEditEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEditEmail" name="inputEditEmail">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEditPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputEditPassword" name="inputEditPassword">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEditNama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEditNama" name="inputEditNama">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEditTTL" class="col-sm-2 col-form-label">Tempat, Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEditTTL" name="inputEditTTL">
                        </div>
                    </div>
                    <fieldset class="row mb-3" name="listJenisKelamin">
                        <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radioJenisKelamin" id="radioJenisKelamin1" value="pria" checked>
                                <label class="form-check-label" for="radioJenisKelamin1">
                                    Pria
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radioJenisKelamin" id="radioJenisKelamin2" value="wanita">
                                <label class="form-check-label" for="radioJenisKelamin2">
                                    Wanita
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    <div class="row mb-3">
                        <label for="inputEditAlamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEditAlamat" name="inputEditAlamat">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEditNoHP" class="col-sm-2 col-form-label">No. Handphone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEditNoHP" name="inputEditNoHP">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10 offset-sm-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="checkBoxEditPegawai" onclick="confirmEditPegawai()">
                                <label class="form-check-label" for="checkBoxEditPegawai">
                                    Setuju?
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btnEditPegawai">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Image -->
<div class="modal fade" id="userFotoModal" tabindex="-1" aria-labelledby="userFotoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userFotoModalLabel">Bukti Transfer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="" class="img-fluid image-modal" id="userFoto" alt="...">
            </div>
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
                <form onsubmit="return submitDeletePegawai(this)" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
