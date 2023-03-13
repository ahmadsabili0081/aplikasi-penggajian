<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h4>Tambah Data Pegawai</h4>
      </div>
      <div class="card-body">
        <form action="<?= base_url() . "admin/tambahPegawai"; ?>" method="POST">
          <div class="form-group">
            <label for="nama jabatan">Nama Pegawai</label>
            <input type="text" class="form-control" value="<?= set_value('nama_pegawai') ?>" name="nama_pegawai" placeholder="Nama Pegawai">
            <?= form_error('nama_pegawai', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="nik">NIK</label>
            <input type="number" min="1" class="form-control" value="<?= set_value('nik') ?>" name="nik" placeholder="NIK">
            <?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="jk">Jenis Kelamin</label>
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
            <label for="jabatan">Jabatan</label>
            <select name="jabatan" class="form-control">
              <option selected>--Pilih Jabatan--</option>
              <?php foreach ($jabatan as $jabatanOpt) :  ?>
                <option value="<?= $jabatanOpt['id_jabatan']; ?>"><?= $jabatanOpt['nama_jabatan']; ?></option>
              <?php endforeach; ?>
            </select>
            <?= form_error('jabatan', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="jk">Tanggal & Tahun Masuk</label>
            <input type="date" name="tgl_masuk" class="form-control form-control-user">
            <?= form_error('tgl_masuk', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control">
              <option selected>--Pilih Status--</option>
              <option value="Karyawan Tetap">Karyawan Tetap</option>
              <option value="Karyawan Tidak Tetap">Karyawan Tidak Tetap</option>
              <option value="Fresh Graduate">Fresh Graduate</option>
            </select>
            <?= form_error('status', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="Email">Email</label>
            <input type="text" " class=" form-control" value="<?= set_value('email') ?>" name="email" placeholder="Email">
            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
          </div>
          <a href="<?= base_url() . "admin/dataPegawai" ?>" class="btn btn-warning">Kembali</a>
          <button class="btn btn-primary" type="submit">Tambah Data Pegawai</button>
        </form>
      </div>
    </div>
  </div>
</div>