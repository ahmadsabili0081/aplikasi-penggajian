<div class="row">
  <div class="col-md-8">
    <div class="card">
      <?= $this->session->flashdata('pesan'); ?>
      <div class="card-header">
        <h4>Ubah Password</h4>
      </div>
      <div class="card-body">
        <form action="<?= base_url() . "admin/ubahPassword" ?>" method="post">
          <div class="form-group">
            <label for="password">Password Saat ini</label>
            <input type="password" class="form-control" name="passwordLama" placeholder="Masukkan Password Lama...">
            <?= form_error('passwordLama', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password1" placeholder="Password baru...">
            <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="password">Konfirmasi Password</label>
            <input type="password" class="form-control" name="password2" placeholder="Konfirmasi Password...">
            <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
          </div>
          <a href="<?= base_url() . "user" ?>" class="btn btn-warning">Kembali</a>
          <button class="btn btn-primary" type="submit">Ubah Password</button>
        </form>
      </div>
    </div>
  </div>
</div>