<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h4>Edit Data Jabatan</h4>
      </div>
      <div class="card-body">
        <form action="<?= base_url() . "admin/editJabatan"; ?>" method="POST">
          <input type="hidden" name="id_jabatan" value="<?= $userEdit['id_jabatan']; ?>">
          <div class="form-group">
            <label for="nama jabatan">Nama Jabatan</label>
            <input type="text" class="form-control" name="namaJabatan" value="<?= $userEdit['nama_jabatan']; ?>" placeholder="Nama Jabatan">
            <?= form_error('namaJabatan', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="nama jabatan">Gaji Pokok</label>
            <input type="text" min="1" class="form-control" value="<?= $userEdit['gaji_pokok'] ?>" name="gajiPokok" placeholder="Gaji Pokok">
            <?= form_error('gajiPokok', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="nama jabatan">Tunjangan</label>
            <input type="text" min="1" class="form-control" value="<?= $userEdit['tunjangan']; ?>" name="tunjangan" placeholder="Tunjangan">
            <?= form_error('tunjangan', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="nama jabatan">Uang Makan</label>
            <input type="text" min="1" class="form-control" value="<?= $userEdit['uang_makan']; ?>" name="uangMakan" placeholder="Uang Makan">
            <?= form_error('uangMakan', '<small class="text-danger">', '</small>'); ?>
          </div>
          <button class="btn btn-primary" type="submit">Edit Data Jabatan</button>
        </form>
      </div>
    </div>
  </div>
</div>