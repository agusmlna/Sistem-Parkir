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
                <div
                    class="d-sm-flex align-items-center justify-content-between mb-4"
                >
                    <h1 class="h3 mb-0 text-gray-800 fw-bold">Dashboard</h1>
                </div>

                <!-- Content Row -->
                <div class="row">
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div
                                            class="text-xs font-weight-bold text-primary text-uppercase mb-1"
                                        >
                                            Laporan Harian
                                        </div>
                                        <div
                                            class="h5 mb-0 font-weight-bold text-gray-800"
                                        >
                                            Rp. 500.000
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i
                                            class="fas fa-calendar fa-2x text-gray-300"
                                        ></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div
                                            class="text-xs font-weight-bold text-success text-uppercase mb-1"
                                        >
                                            Laporan Bulanan
                                        </div>
                                        <div
                                            class="h5 mb-0 font-weight-bold text-gray-800"
                                        >
                                            Rp. 5.000.000
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i
                                            class="fas fa-dollar-sign fa-2x text-gray-300"
                                        ></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div
                                            class="text-xs font-weight-bold text-info text-uppercase mb-1"
                                        >
                                            Data Motor
                                        </div>
                                        <div
                                            class="row no-gutters align-items-center"
                                        >
                                            <div class="col-auto">
                                                <div
                                                    class="h5 mb-0 mr-3 font-weight-bold text-gray-800"
                                                >
                                                    Total :
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div
                                                    class="h5 mb-0 mr-3 font-weight-bold text-gray-800"
                                                >
                                                    15
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i
                                            class="fas fa-clipboard-list fa-2x text-gray-300"
                                        ></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div
                                            class="text-xs font-weight-bold text-warning text-uppercase mb-1"
                                        >
                                            Data Pegawai
                                        </div>
                                        <div
                                            class="h5 mb-0 font-weight-bold text-gray-800"
                                        >
                                            2
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i
                                            class="fas fa-comments fa-2x text-gray-300"
                                        ></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Row -->
                <div class="row">
                    <div class="col">
                        <!-- Approach -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                    Data Pegawai
                                </h6>
                            </div>
                            <div class="card-body">
                                <h3 class="font-weight-bold">AP Tantrum</h3>
                                <p class="mb-0">Senin, 17 Mei 2024</p>
                                <!-- Button trigger modal -->
                                <button
                                    type="button"
                                    class="btn btn-primary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"
                                >
                                    detail
                                </button>

                                <!-- Modal -->
                                <div
                                    class="modal fade"
                                    id="exampleModal"
                                    tabindex="-1"
                                    aria-labelledby="exampleModalLabel"
                                    aria-hidden="true"
                                >
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1
                                                    class="modal-title fs-5 fw-bold"
                                                    id="exampleModalLabel"
                                                >
                                                    Pegawai
                                                </h1>
                                                <button
                                                    type="button"
                                                    class="btn-close"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close"
                                                ></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <div class="row justify-content-center">
                                                        <div class="col-4">
                                                        <img src="dasd" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="row justify-content-center">
                                                        <div class="col-4">
                                                        Nama :
                                                        </div>
                                                        <div class="col-4">
                                                        Jidan Nurrosadi
                                                        </div>
                                                    </div>
                                                    <div class="row justify-content-center">
                                                        <div class="col-4">
                                                        Tempat, Tanggal Lahir :
                                                        </div>
                                                        <div class="col-4">
                                                        Bogor, 16 Agustus 2001
                                                        </div>
                                                    </div>
                                                    <div class="row justify-content-center">
                                                        <div class="col-4">
                                                        No telpon :
                                                        </div>
                                                        <div class="col-4">
                                                        08778081263	
                                                        </div>
                                                    </div>
                                                    <div class="row justify-content-center">
                                                        <div class="col-4">
                                                        Jenis Kelamin :
                                                        </div>
                                                        <div class="col-4">
                                                        Pria	
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button
                                                    type="button"
                                                    class="btn btn-secondary"
                                                    data-bs-dismiss="modal"
                                                >
                                                    Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <!-- Illustrations -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                    Keterangan
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <img
                                        class="img-fluid px-3 px-sm-4 mt-3 mb-4"
                                        style="width: 25rem"
                                        src="{{ ('../img/fotoparkir.jpg ') }}"
                                        alt="..."
                                    />
                                </div>
                                <p>
                                    parkiran yang terletak di daerah cibinong, jawa barat
                                </p>
                            </div>
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
                    <span>Copyright &copy; Your Website 2021</span>
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
<div
    class="modal fade"
    id="logoutModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Ready to Leave?
                </h5>
                <button
                    class="close"
                    type="button"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Select "Logout" below if you are ready to end your current
                session.
            </div>
            <div class="modal-footer">
                <button
                    class="btn btn-secondary"
                    type="button"
                    data-dismiss="modal"
                >
                    Cancel
                </button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

@endsection
