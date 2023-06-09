<div class="row justify-content-center">

  <div class="col-lg-6 col-md-6">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">LOGIN KARYAWAN</h1>
              </div>
              <?= $this->session->flashdata('pesan'); ?>
              <form class="user" action="<?= base_url() . "auth"; ?>" method="post">
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" name="email" placeholder="Enter Email Address...">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Login
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="<?= base_url('auth/forgotPassword'); ?>">Lupa Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="<?= base_url() . "auth/registration" ?>">Sudah memiliki akun? Daftar!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>