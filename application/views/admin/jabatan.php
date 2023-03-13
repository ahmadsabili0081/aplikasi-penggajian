<div class="row">
  <div class="col-md-12">
    <?= $this->session->flashdata('pesan'); ?>
    <a href="<?= base_url() . "admin/TambahData"; ?>" class="btn btn-primary mb-3">Tambah Data</a>
    <div class="card shadow">
      <div class="card-header">
        <h3 style="text-align: center;" class="m-0 font-weight-bold text-dark">Tabel Data Jabatan</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Jabatan</th>
                <th>Gaji Pokok</th>
                <th>Tj. Transportasi</th>
                <th>Uang Makan</th>
                <th>total</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($jabatan as $jabatanData) :  ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $jabatanData['nama_jabatan']; ?></td>
                  <td><?= "Rp. " . number_format($jabatanData['gaji_pokok']); ?></td>
                  <td><?= "Rp. " . number_format($jabatanData['tunjangan']); ?></td>
                  <td><?= "Rp. " . number_format($jabatanData['uang_makan']); ?></td>
                  <td><?= "Rp." . number_format($jabatanData['gaji_pokok'] + $jabatanData['tunjangan'] + $jabatanData['uang_makan']); ?></td>
                  <td>
                    <center>
                      <a href="<?= base_url() . "admin/editJabatan/$jabatanData[id_jabatan]"; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                      <a onclick="return confirm('Apakah anda yakin ingin menghapus?')" href="<?= base_url() . "admin/hapusJabatan/$jabatanData[id_jabatan]"; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    </center>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>