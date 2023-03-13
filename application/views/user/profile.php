<div class="row">
  <div class="col-md-12">
    <?= $this->session->flashdata('pesan'); ?>
  </div>
</div>
<div class="row">
  <div class="col-md-8">
    <form action="<?= base_url() . "user/myProfile" ?>" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id_pegawai" value="<?= $user['id_pegawai']; ?>">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email" value="<?= $user['email']; ?>" placeholder="Email...">
        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
      </div>
      <div class="form-group">
        <label for="nama">Nama Pegawai</label>
        <input type="text" class="form-control" name="nama_pegawai" value="<?= $user['nama_pegawai']; ?>" placeholder="Nama Lengkap...">
        <?= form_error('nama_pegawai', '<small class="text-danger">', '</small>'); ?>
      </div>
      <div class="form-group">
        <label for="nik">Nik</label>
        <input type="number" class="form-control" value="<?= $user['nik'] ?>" name="nik" placeholder="NIK...">
        <?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
      </div>
      <div class="form-group">
        <label for="jabatan">Jabatan</label>
        <select name="jabatan" class="form-control">
          <?php foreach ($jabatanUser as $jabatan) : ?>
            <?php if (ucwords($jabatan['nama_jabatan']) == ucwords($user['nama_jabatan'])) : ?>
              <option value="<?= $user['id_jabatan']; ?>" selected><?= $user['nama_jabatan']; ?></option>
            <?php else : ?>
              <option value="<?= $jabatan['id_jabatan']; ?>"><?= $jabatan['nama_jabatan']; ?></option>
            <?php endif ?>
          <?php endforeach; ?>
        </select>
        <?= form_error('jabatan', '<small class="text-danger">', '</small>'); ?>
      </div>
      <div class="form-group">
        <label for="status">Status</label>
        <select name="status" class="form-control">
          <?php foreach ($status as $status) : ?>
            <?php if (ucwords($status) == ucwords($user['status'])) : ?>
              <option value="<?= $user['status']; ?>" selected><?= $user['status']; ?></option>
            <?php else : ?>
              <option value="<?= $status; ?>"><?= $status; ?></option>
            <?php endif ?>
          <?php endforeach; ?>
        </select>
        <?= form_error('status', '<small class="text-danger">', '</small>'); ?>
      </div>
      <div class="form-group">
        <label for="nik">Jenis Kelamin</label>
        <select name="jk" class="form-control">
          <?php foreach ($jenis_kelamin as $jk) : ?>
            <?php if (ucwords($jk) == ucwords($user['jk'])) : ?>
              <option value="<?= $user['jk']; ?>" selected><?= $user['jk'] ?></option>
            <?php else : ?>
              <option value="<?= $jk ?>"><?= $jk ?></option>
            <?php endif; ?>
          <?php endforeach; ?>
        </select>
        <?= form_error('jk', '<small class="text-danger">', '</small>'); ?>
      </div>
      <div class="form-group">
        <label for="tgl_masuk">Tanggal Masuk</label>
        <input type="date" class="form-control" value="<?= $user['tgl_masuk'] ?>" name="tgl_masuk" placeholder="tgl_masuk...">
        <?= form_error('tgl_masuk', '<small class="text-danger">', '</small>'); ?>
      </div>
      <div class="form-group row">
        <div class="col-sm-10">
          <div class="row">
            <div class="col-sm-3">
              <img src="<?= base_url() . "assets/images/profile/$user[images]";  ?>" class="img-thumbnail">
            </div>
            <div class="col-sm-9">
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="gambar">
                <label class="custom-file-label" for="Images"><?= $user['images'] ?></label>
              </div>
            </div>
          </div>
        </div>
      </div>
      <a href="<?= base_url() . "user" ?>" class="btn btn-warning">Kembali</a>
      <button class="btn btn-primary" type="submit">Ubah Profile</button>
    </form>
  </div>
</div>