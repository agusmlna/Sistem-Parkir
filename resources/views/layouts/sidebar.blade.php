<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href='/dashboard'>
        <div class="sidebar-brand-icon">
            <i class="fas fa-parking"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SI Parkir</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href='/dashboard'>
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider">
    @if (session('role') == 'admin')
    <div id="master">
        <!-- Divider -->
        <hr class="sidebar-divider mb-0">

        <li class="nav-item {{ request()->is('motor') ? 'active' : '' }}">
            <a class="nav-link" href='/motor'>
                <i class="fas fa-fw fa-motorcycle"></i>
                <span>Motor</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item {{ request()->is('merek-motor') ? 'active' : '' }}">
            <a class="nav-link" href='/merek-motor'>
                <i class="fas fa-band-aid"></i>
                <span>Merek Motor</span></a>

        <li class="nav-item {{ request()->is('jenis-motor') ? 'active' : '' }}">
            <a class="nav-link" href='/jenis-motor'>
                <i class="fas fa-cogs"></i>
                <span>Jenis Motor</span></a>
        </li>
    </div>
    <hr class="sidebar-divider">
    @endif


    @if (session('role') == 'owner')

    <li class="nav-item {{ request()->is('data-pegawai') ? 'active' : '' }}">
        <a class="nav-link" href='/data-pegawai'>
            <i class="fas fa-users"></i>
            <span>Data Pegawai</span></a>
    </li>
    @endif

    @if (session('role') == 'admin')
    <li class="nav-item {{ request()->is('tambah-data-parkir') ? 'active' : '' }}">
        <a class="nav-link" href='/tambah-data-parkir'>
            <i class="fas fa-fw fa-table"></i>
            <span>Tambah Data Parkir</span></a>
    </li>
    @endif

    <!-- Nav Item - Tables -->
    <li class="nav-item {{ request()->is('data-parkir') ? 'active' : '' }}">
        <a class="nav-link" href='/data-parkir'>
            <i class="fas fa-database"></i>
            <span>Data Parkir</span></a>
    </li>

    <li class="nav-item {{ request()->is('report') ? 'active' : '' }}">
        <a class="nav-link" href="/report">
            <i class="fas fa-flag"></i>
            <span>Report</span></a>
    </li>
    <li class="nav-item {{ request()->is('komplain') ? 'active' : '' }}">
        <a class="nav-link" href="/komplain">
            <i class="fas fa-exclamation"></i>
            <span>Komplain</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->