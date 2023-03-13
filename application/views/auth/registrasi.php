<div class="card o-hidden border-0 shadow-lg my-5 col-lg-8 mx-auto">
  <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">
      <div class="col-lg">
        <div class="p-5">
          <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Registrasi</h1>
          </div>
          <form class="user" action="<?= base_url() . "auth/registration"; ?>" method="post">
            <div class="form-group">
              <input type="text" class="form-control form-control-user" value="<?= set_value('nama'); ?>" name="nama" placeholder="Nama Lengkap">
              <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-user" value="<?= set_value('nik') ?>" name="nik" placeholder="NIK">
              <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jk" value="Laki-Laki">
                <label class="form-check-label">
                  Laki-Laki
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jk" value="Perempuan">
                <label class="form-check-label">
                  Perempuan
                </label>
              </div>
            </div>
            <div class="form-group">
              <select class="form-control" name="jabatan">
                <option selected>--Pilih Jabatan--</option>
                <?php foreach ($jabatan as $jabatanData) :  ?>
                  <option value="<?= $jabatanData['id_jabatan'] ?>"><?= $jabatanData['nama_jabatan']; ?></option>
                <?php endforeach; ?>
              </select>
              <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <select name="status" class="form-control">
                <option selected>--Pilih Status--</option>
                <option value="Karyawan Tetap">Karyawan Tetap</option>
                <option value="Karyawan Tidak Tetap">Karyawan Tidak Tetap</option>
                <option value="Fresh Graduate">Fresh Graduate</option>
              </select>
              <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-user" value="<?= set_value('email'); ?>" name="email" placeholder="Email Address">
              <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
              <input type="date" name="tgl_masuk" class="form-control form-control-user">
              <?= form_error('tgl_masuk', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="password" class="form-control form-control-user" name="password1" placeholder="Password">
                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="col-sm-6">
                <input type="password" class="form-control form-control-user" name="password2" placeholder="Repeat Password">
                <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
              Register Account
            </button>
          </form>
          <hr>
          <div class="text-center">
            <a class="small" href="<?= base_url('auth'); ?>">Kembali?</a>
          </div>
          <div class="text-center">
            <a class="small" href="<?= base_url() . "auth" ?>">Sudah memiliki akun? Login!</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>