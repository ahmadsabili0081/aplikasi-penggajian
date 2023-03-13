<div class="row">
  <div class="col-md-12">
    <?= $this->session->flashdata('pesan'); ?>
    <a href="<?= base_url() . "admin/tambahPegawai"; ?>" class="btn btn-primary mb-3">Tambah Data</a>
    <div class="card shadow">
      <div class="card-header">
        <h3 style="text-align: center;" class="m-0 font-weight-bold text-dark">Tabel Data Pegawai</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Pegawai</th>
                <th>Nik</th>
                <th>Jenis Kelamin</th>
                <th>Jabatan</th>
                <th>Tanggal & Tahun Masuk</th>
                <th>Status Masuk</th>
                <th>Gambar</th>
                <th>Email</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($userJabatan as $data) :  ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $data['nama_pegawai']; ?></td>
                  <td><?= $data['nik']; ?></td>
                  <td><?= $data['jk']; ?></td>
                  <td><?= $data['nama_jabatan']; ?></td>
                  <td><?= $data['tgl_masuk']; ?></td>
                  <td><?= $data['status']; ?></td>
                  <td><img width="75px" src="<?= base_url() . "assets/images/profile/$data[images]"; ?>"></td>
                  <td><?= $data['email']; ?></td>
                  <td>
                    <center>
                      <a href="<?= base_url() . "admin/editPegawai/$data[id_pegawai]"; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                      <a onclick="return confirm('Apakah anda yakin ingin menghapus?')" href="<?= base_url() . "admin/hapusPegawai/$data[id_pegawai]"; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    </center>
                  </td>
                <tr>
                <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>