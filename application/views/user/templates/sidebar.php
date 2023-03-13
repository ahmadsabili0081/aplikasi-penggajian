        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

          <!-- Sidebar - Brand -->
          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() . "user"; ?>">
            <div class="sidebar-brand-text mx-3"><small>PT.BANK INDONESIA JAYA</small></div>
          </a>

          <!-- Divider -->
          <hr class="sidebar-divider my-0">

          <!-- Nav Item - Dashboard -->
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() . "user/"; ?>">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Dashboard</span></a>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider">

          <!-- Heading -->
          <div class="sidebar-heading">
            USER
          </div>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() . "user/myProfile"; ?>">
              <i class="fas fa-fw fa-user"></i>
              <span>Profile Saya</span></a>
          </li>

          <li class="nav-item">
            <?php if ($user['bulan'] != $bulan) :  ?>
              <a target="_blank" class="nav-link" href="<?= base_url('user/cetakSlipGaji'); ?>">
                <i class="fas fa-fw fa-print"></i>
                <span>Cetak Slip Gaji</span></a>
            <?php else : ?>
              <a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModal">
                <i class="fas fa-fw fa-print"></i>
                <span>Cetak Slip Gaji</span></a>
            <?php endif ?>
          </li>

          <!-- Heading -->
          <div class="sidebar-heading">
            SETTINGS
          </div>

          <!-- Nav Item - Charts -->
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() . "user/ubahPassword"; ?>">
              <i class="fas fa-fw fa-key"></i>
              <span>Ubah Password</span></a>
          </li>

          <!-- Nav Item - Tables -->
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() . "user/logout" ?>">
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
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title text-warning" id="exampleModalLabel">Pemberitahuan*</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p class="text-center">Mohon maaf, anda belum bisa mencetak slip gaji</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>