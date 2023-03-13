<div class="container ">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
      <?= $title; ?>
    </h1>
  </div>
  <?= $this->session->flashdata('pesan'); ?>
  <a href="<?= base_url() . "admin/tambahPotongan"; ?>" class="btn btn-sm btn-primary mb-2 mt-2"><i class="fas fa-plus"></i> Tambah Data</a>
  <div class="row mt-4">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3>Tabel Potongan Gaji</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Jenis Potongan</th>
                  <th class="text-center">Jumlah Potongan</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($potongan as $potonganGaji) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $potonganGaji['potongan']; ?></td>
                    <td>Rp. <?= number_format($potonganGaji['jml_potongan']); ?></td>
                    <td>
                      <center>
                        <a href="<?= base_url("admin/updatePotongan/" . $potonganGaji['id_potongan'] . ""); ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <a onclick="return confirm('Yakin ingin mengahapus')" href="<?= base_url("admin/hapusPotongan/" . $potonganGaji['id_potongan'] . ""); ?>" class="btn btn-danger"><i class="fas fa-edit"></i></a>
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
</div>