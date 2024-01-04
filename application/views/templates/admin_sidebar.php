  <!-- Page Wrapper -->
  <div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-graduation-cap"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PPDB ONLINE</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('admin'); ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('admin/dataSiswa'); ?>">
            <i class="far fa-fw fa-address-card"></i>
            <span>Data Siswa</span></a>
    </li>
    <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('admin/berkas'); ?>">
            <i class="fas fa-fw fa-file-alt"></i>
                <span>Berkas Siswa</span></a>
    </li>
    <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('admin/pembayaran'); ?>">
                <i class="fas fa-fw fa-money-check-alt"></i>
                <span>Verifikasi Pembayaran</span></a>
    </li>
    <li class="nav-item active">
     
        <a class="nav-link" href="<?= base_url('admin/siswaDiterima'); ?>">
            <i class="fas fa-fw fa-bullhorn"></i>
            <span>Siswa Diterima</span></a>
    </li>
    <li class="nav-item active">
     
        <a class="nav-link" href="<?= base_url('admin/user'); ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Manajemen User</span></a>
    </li>
    <li class="nav-item active">
     
        <a class="nav-link" href="<?= base_url('admin/gantiPassword'); ?>">
            <i class="fas fa-fw fa-key"></i>
            <span>Ganti Password</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->