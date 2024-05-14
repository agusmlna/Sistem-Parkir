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
            <nav
                class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"
            >
                <!-- Sidebar Toggle (Topbar) -->
                <button
                    id="sidebarToggleTop"
                    class="btn btn-link d-md-none rounded-circle mr-3"
                >
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <form
                    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
                >
                    <div class="input-group">
                        <input
                            type="text"
                            class="form-control bg-light border-0 small"
                            placeholder="Search for..."
                            aria-label="Search"
                            aria-describedby="basic-addon2"
                        />
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="searchDropdown"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div
                            class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                            aria-labelledby="searchDropdown"
                        >
                            <form
                                class="form-inline mr-auto w-100 navbar-search"
                            >
                                <div class="input-group">
                                    <input
                                        type="text"
                                        class="form-control bg-light border-0 small"
                                        placeholder="Search for..."
                                        aria-label="Search"
                                        aria-describedby="basic-addon2"
                                    />
                                    <div class="input-group-append">
                                        <button
                                            class="btn btn-primary"
                                            type="button"
                                        >
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="alertsDropdown"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter"
                                >3+</span
                            >
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div
                            class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="alertsDropdown"
                        >
                            <h6 class="dropdown-header">Alerts Center</h6>
                            <a
                                class="dropdown-item d-flex align-items-center"
                                href="#"
                            >
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i
                                            class="fas fa-file-alt text-white"
                                        ></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">
                                        December 12, 2019
                                    </div>
                                    <span class="font-weight-bold"
                                        >A new monthly report is ready to
                                        download!</span
                                    >
                                </div>
                            </a>
                            <a
                                class="dropdown-item d-flex align-items-center"
                                href="#"
                            >
                                <div class="mr-3">
                                    <div class="icon-circle bg-success">
                                        <i class="fas fa-donate text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">
                                        December 7, 2019
                                    </div>
                                    $290.29 has been deposited into your
                                    account!
                                </div>
                            </a>
                            <a
                                class="dropdown-item d-flex align-items-center"
                                href="#"
                            >
                                <div class="mr-3">
                                    <div class="icon-circle bg-warning">
                                        <i
                                            class="fas fa-exclamation-triangle text-white"
                                        ></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">
                                        December 2, 2019
                                    </div>
                                    Spending Alert: We've noticed unusually high
                                    spending for your account.
                                </div>
                            </a>
                            <a
                                class="dropdown-item text-center small text-gray-500"
                                href="#"
                                >Show All Alerts</a
                            >
                        </div>
                    </li>

                    <!-- Nav Item - Messages -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="messagesDropdown"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            <i class="fas fa-envelope fa-fw"></i>
                            <!-- Counter - Messages -->
                            <span class="badge badge-danger badge-counter"
                                >7</span
                            >
                        </a>
                        <!-- Dropdown - Messages -->
                        <div
                            class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="messagesDropdown"
                        >
                            <h6 class="dropdown-header">Message Center</h6>
                            <a
                                class="dropdown-item d-flex align-items-center"
                                href="#"
                            >
                                <div class="dropdown-list-image mr-3">
                                    <img
                                        class="rounded-circle"
                                        src="img/undraw_profile_1.svg"
                                        alt="..."
                                    />
                                    <div
                                        class="status-indicator bg-success"
                                    ></div>
                                </div>
                                <div class="font-weight-bold">
                                    <div class="text-truncate">
                                        Hi there! I am wondering if you can help
                                        me with a problem I've been having.
                                    </div>
                                    <div class="small text-gray-500">
                                        Emily Fowler · 58m
                                    </div>
                                </div>
                            </a>
                            <a
                                class="dropdown-item d-flex align-items-center"
                                href="#"
                            >
                                <div class="dropdown-list-image mr-3">
                                    <img
                                        class="rounded-circle"
                                        src="img/undraw_profile_2.svg"
                                        alt="..."
                                    />
                                    <div class="status-indicator"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">
                                        I have the photos that you ordered last
                                        month, how would you like them sent to
                                        you?
                                    </div>
                                    <div class="small text-gray-500">
                                        Jae Chun · 1d
                                    </div>
                                </div>
                            </a>
                            <a
                                class="dropdown-item d-flex align-items-center"
                                href="#"
                            >
                                <div class="dropdown-list-image mr-3">
                                    <img
                                        class="rounded-circle"
                                        src="img/undraw_profile_3.svg"
                                        alt="..."
                                    />
                                    <div
                                        class="status-indicator bg-warning"
                                    ></div>
                                </div>
                                <div>
                                    <div class="text-truncate">
                                        Last month's report looks great, I am
                                        very happy with the progress so far,
                                        keep up the good work!
                                    </div>
                                    <div class="small text-gray-500">
                                        Morgan Alvarez · 2d
                                    </div>
                                </div>
                            </a>
                            <a
                                class="dropdown-item d-flex align-items-center"
                                href="#"
                            >
                                <div class="dropdown-list-image mr-3">
                                    <img
                                        class="rounded-circle"
                                        src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                        alt="..."
                                    />
                                    <div
                                        class="status-indicator bg-success"
                                    ></div>
                                </div>
                                <div>
                                    <div class="text-truncate">
                                        Am I a good boy? The reason I ask is
                                        because someone told me that people say
                                        this to all dogs, even if they aren't
                                        good...
                                    </div>
                                    <div class="small text-gray-500">
                                        Chicken the Dog · 2w
                                    </div>
                                </div>
                            </a>
                            <a
                                class="dropdown-item text-center small text-gray-500"
                                href="#"
                                >Read More Messages</a
                            >
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="userDropdown"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            <span
                                class="mr-2 d-none d-lg-inline text-gray-600 small"
                                >Douglas McGee</span
                            >
                            <img
                                class="img-profile rounded-circle"
                                src="img/undraw_profile.svg"
                            />
                        </a>
                        <!-- Dropdown - User Information -->
                        <div
                            class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown"
                        >
                            <a class="dropdown-item" href="#">
                                <i
                                    class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"
                                ></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i
                                    class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"
                                ></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i
                                    class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"
                                ></i>
                                Activity Log
                            </a>
                            <div class="dropdown-divider"></div>
                            <a
                                class="dropdown-item"
                                href="#"
                                data-toggle="modal"
                                data-target="#logoutModal"
                            >
                                <i
                                    class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"
                                ></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <div
                    class="d-sm-flex align-items-center justify-content-between mb-4"
                >
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    <a
                        href="#"
                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                        ><i class="fas fa-download fa-sm text-white-50"></i>
                        Generate Report</a
                    >
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
                                    Launch demo modal
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
                                                    class="modal-title fs-5"
                                                    id="exampleModalLabel"
                                                >
                                                    Modal title
                                                </h1>
                                                <button
                                                    type="button"
                                                    class="btn-close"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close"
                                                ></button>
                                            </div>
                                            <div class="modal-body">...</div>
                                            <div class="modal-footer">
                                                <button
                                                    type="button"
                                                    class="btn btn-secondary"
                                                    data-bs-dismiss="modal"
                                                >
                                                    Close
                                                </button>
                                                <button
                                                    type="button"
                                                    class="btn btn-primary"
                                                >
                                                    Save changes
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
                                    Illustrations
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <img
                                        class="img-fluid px-3 px-sm-4 mt-3 mb-4"
                                        style="width: 25rem"
                                        src="img/undraw_posting_photo.svg"
                                        alt="..."
                                    />
                                </div>
                                <p>
                                    Add some quality, svg illustrations to your
                                    project courtesy of
                                    <a
                                        target="_blank"
                                        rel="nofollow"
                                        href="https://undraw.co/"
                                        >unDraw</a
                                    >, a constantly updated collection of
                                    beautiful svg images that you can use
                                    completely free and without attribution!
                                </p>
                                <a
                                    target="_blank"
                                    rel="nofollow"
                                    href="https://undraw.co/"
                                    >Browse Illustrations on unDraw &rarr;</a
                                >
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