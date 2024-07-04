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
                    <h1 class="h3 mb-2 text-gray-800">Data Pegawai</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Isi Data Pegawai</h6>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Tambah Data Pegawai
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Pegawai</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form>
                                    <div class="row mb-3">
                                        <label for="formFile" class="form-label">Upload Foto</label>
                                        <input class="form-control" type="file" id="formFile">
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail3">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                        <input type="password" class="form-control" id="inputPassword3">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputNama4" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputNama4">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputTTL4" class="col-sm-2 col-form-label">Tempat, Tanggal Lahir</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputTTL4">
                                        </div>
                                    </div>
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                                        <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                            <label class="form-check-label" for="gridRadios1">
                                            Pria
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                            <label class="form-check-label" for="gridRadios2">
                                            Wanita
                                            </label>
                                        </div> 
                                        </div>
                                    </fieldset> 
                                    <div class="row mb-3">
                                        <label for="inputAlamat4" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputAlamat4">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputNoHP4" class="col-sm-2 col-form-label">No. Handphone</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputNoHP4">
                                        </div>
                                    </div> 
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
                                    <button type="button" class="btn btn-primary">Submit</button>
                                </div>
                                </div>
                            </div>
                            </div>
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
                                        <tr>
                                            <td>1</td>
                                            <td> <img src="" alt=""> </td>
                                            <td>Freddie Mercury</td>
                                            <td>Bogor, 16 Agustus 1980</td>
                                            <td>Pria</td> 
                                            <td>Jalan Bogor Mediterania no 4</td>
                                            <td>08778081263</td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editPegawai">
                                                Edit
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="editPegawai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Pegawai</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form>
                                                                    <div class="row mb-3">
                                                                        <label for="formFile" class="form-label">Upload Foto</label>
                                                                        <input class="form-control" type="file" id="formFile">
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                                                        <div class="col-sm-10">
                                                                        <input type="email" class="form-control" id="inputEmail3">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                                                        <div class="col-sm-10">
                                                                        <input type="password" class="form-control" id="inputPassword3">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label for="inputNama4" class="col-sm-2 col-form-label">Nama</label>
                                                                        <div class="col-sm-10">
                                                                        <input type="text" class="form-control" id="inputNama4">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label for="inputTTL4" class="col-sm-2 col-form-label">Tempat, Tanggal Lahir</label>
                                                                        <div class="col-sm-10">
                                                                        <input type="text" class="form-control" id="inputTTL4">
                                                                        </div>
                                                                    </div>
                                                                    <fieldset class="row mb-3">
                                                                        <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                                                                        <div class="col-sm-10">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                                                            <label class="form-check-label" for="gridRadios1">
                                                                            Pria
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                                                            <label class="form-check-label" for="gridRadios2">
                                                                            Wanita
                                                                            </label>
                                                                        </div> 
                                                                        </div>
                                                                    </fieldset> 
                                                                    <div class="row mb-3">
                                                                        <label for="inputAlamat4" class="col-sm-2 col-form-label">Alamat</label>
                                                                        <div class="col-sm-10">
                                                                        <input type="text" class="form-control" id="inputAlamat4">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <label for="inputNoHP4" class="col-sm-2 col-form-label">No. Handphone</label>
                                                                        <div class="col-sm-10">
                                                                        <input type="text" class="form-control" id="inputNoHP4">
                                                                        </div>
                                                                    </div> 
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
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-danger btn-sm"> Hapus
                                                </button>
                                            </td>
                                        </tr> 
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