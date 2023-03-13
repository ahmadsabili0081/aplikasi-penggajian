<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h4>Edit Data Pegawai</h4>
      </div>
      <div class="card-body">
        <form action="<?= base_url() . "admin/editPegawai/$userById[id_pegawai]"; ?>" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id_pegawai" value="<?= $userById['id_pegawai']; ?>">
          <div class="form-group">
            <label for="nama Pegawai">Nama Pegawai</label>
            <input type="text" class="form-control" name="nama_pegawai" value="<?= $userById['nama_pegawai']; ?>">
            <?= form_error('nama_pegawai', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" min="1" class="form-control" value="<?= $userById['nik'] ?>" name="nik">
            <?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="jk">Jenis Kelamin</label>
            <select name="jk" class="form-control">
              <?php foreach ($jenisKelamin as $jenisK) : ?>
                <?php if ($jenisK == $userById['jk']) :  ?>
                  <option selected value="<?= $userById['jk'] ?>"><?= $userById['jk']; ?></option>
                <?php else : ?>
                  <option value="<?= $jenisK; ?>"><?= $jenisK; ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <select name="jabatan" class="form-control">
              <?php foreach ($jabatan as $jabatan) : ?>
                <?php if ($jabatan['nama_jabatan'] == $userById['nama_jabatan']) :  ?>
                  <option selected value="<?= $userById['id_jabatan']; ?>"><?= $userById['nama_jabatan']; ?></option>
                <?php else :  ?>
                  <option value="<?= $jabatan['id_jabatan']; ?>"><?= $jabatan['nama_jabatan']; ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
            <?= form_error('uangMakan', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="Tanggal masuk">Tanggal Masuk</label>
            <input type="date" class="form-control" name="tgl_masuk" value="<?= $userById['tgl_masuk']; ?>">
            <?= form_error('tgl_masuk', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control">
              <?php foreach ($statusKaryawan as $statusKar) : ?>
                <?php if ($statusKar == $userById['status']) :  ?>
                  <option value="<?= $userById['status']; ?>" selected><?= $userById['status']; ?></option>
                <?php else : ?>
                  <option value="<?= $statusKar ?>"><?= $statusKar; ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
            <?= form_error('status', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-3">
                <img src="<?= base_url() . "assets/images/profile/$userById[images]";  ?>" class="img-thumbnail">
              </div>
              <div class="col-sm-9">
                <div class="custom-file mt-4">
                  <input type="file" class="custom-file-input" name="images">
                  <label class="custom-file-label" for="Image">Choose file</label>
                </div>
              </div>
            </div>
          </div>
          <br>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" value="<?= $userById['email']; ?>" readonly>
            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
          </div>
          <br>
          <br>
          <a class="btn btn-warning mr-2" href="<?= base_url() . "admin/dataPegawai"; ?>">Kembali</a>
          <button class="btn btn-primary" type="submit">Edit Data Pegawai</button>
        </form>
      </div>
    </div>
  </div>
</div>