        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

          <!-- Sidebar - Brand -->
          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-text mx-3"><small>PT.BANK INDONESIA JAYA</small></div>
          </a>

          <!-- Divider -->
          <hr class="sidebar-divider my-0">

          <!-- Nav Item - Dashboard -->
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() . "admin/"; ?>">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Dashboard</span></a>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider">

          <!-- Heading -->
          <div class="sidebar-heading">
            Interface
          </div>

          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
              <i class="fas fa-fw fa-database"></i>
              <span>Master Data</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url() . "admin/dataPegawai"; ?>">Data Pegawai</a>
                <a class="collapse-item" href="<?= base_url() . "admin/dataJabatan"; ?>">Data Jabatan</a>
              </div>
            </div>
          </li>

          <!-- Nav Item - Utilities Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
              <i class="fas fa-fw fa-cash-register"></i>
              <span>Transaksi</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url() . "admin/dataAbsensi" ?>">Data Absensi</a>
                <a class="collapse-item" href="<?= base_url() . "admin/potonganGaji" ?>">Setting Potongan Gaji</a>
                <a class="collapse-item" href="<?= base_url() . "admin/dataPenggajian"; ?>">Data Penggajian</a>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/slipGaji'); ?>">
              <i class="fas fa-fw fa-print"></i>
              <span>Cetak Slip Gaji</span></a>
          </li>
          <!-- Divider -->
          <hr class="sidebar-divider">

          <!-- Heading -->
          <div class="sidebar-heading">
            Addons
          </div>

          <!-- Nav Item - Charts -->
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/ubahPassword'); ?>">
              <i class="fas fa-fw fa-key"></i>
              <span>Ubah Password</span></a>
          </li>

          <!-- Nav Item - Tables -->
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() . "admin/logout" ?>">
              <i class="fas fa-sign-out-alt fa-sm fa-fw"></i>
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

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

          <!-- Main Content -->
          <div id="content">