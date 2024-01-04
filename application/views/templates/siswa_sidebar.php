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
        <a class="nav-link" href="<?= base_url('siswa'); ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('siswa/profil'); ?>">
            <i class="fas fa-fw fa-user-alt"></i>
            <span>Profil</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('siswa/daftar'); ?>">
            <i class="fas fa-fw fa-file-signature"></i>
            <span>Daftar</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('siswa/upload'); ?>">
            <i class="fas fa-fw fa-upload"></i>
            <span>Upload Berkas</span></a>
    </li>
    <!-- <li class="nav-item active">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-print"></i>
            <span>Cetak Formulir</span></a>
    </li> -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('siswa/bayar'); ?>">
            <i class="fas fa-fw fa-money-check-alt"></i>
            <span>Pembayaran</span></a>
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