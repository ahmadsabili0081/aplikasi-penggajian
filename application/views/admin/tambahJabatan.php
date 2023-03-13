<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h4>Tambah Data Jabatan</h4>
      </div>
      <div class="card-body">
        <form action="<?= base_url() . "admin/TambahData"; ?>" method="POST">
          <div class="form-group">
            <label for="nama jabatan">Nama Jabatan</label>
            <input type="text" class="form-control" name="namaJabatan" value="<?= set_value('namaJabatan'); ?>" placeholder="Nama Jabatan">
            <?= form_error('namaJabatan', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="nama jabatan">Gaji Pokok</label>
            <input type="number" min="1" class="form-control" value="<?= set_value('gajiPokok') ?>" name="gajiPokok" placeholder="Gaji Pokok">
            <?= form_error('gajiPokok', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="nama jabatan">Tunjangan</label>
            <input type="number" min="1" class="form-control" value="<?= set_value('tunjangan') ?>" name="tunjangan" placeholder="Tunjangan">
            <?= form_error('tunjangan', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="nama jabatan">Uang Makan</label>
            <input type="number" min="1" class="form-control" value="<?= set_value('uangMakan') ?>" name="uangMakan" placeholder="Uang Makan">
            <?= form_error('uangMakan', '<small class="text-danger">', '</small>'); ?>
          </div>
          <button class="btn btn-primary" type="submit">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>