<div class="container">
  <div class="col-md-12">
    <h3><?= $title; ?></h3>
    <div class="card">
      <div class="card-body">
        <form action="<?= base_url() . "admin/updatePotongan/$potongan[id_potongan]"; ?>" method="POST">
          <input type="hidden" name="id_potongan" value="<?= $potongan['id_potongan']; ?>">
          <div class="form-group">
            <label for="Jenis Potongan">Jenis Potongan</label>
            <input type="text" class="form-control" value="<?= $potongan['potongan']; ?>" placeholder="jenis potongan" name="potongan">
            <?= form_error('potongan', '<small class="text-danger">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="Jumlah Potongan">Jumlah Potongan</label>
            <input type="number" class="form-control" value="<?= $potongan['jml_potongan']; ?>" placeholder="Jumlah Potongan" name="jml_potongan">
            <?= form_error('jml_potongan', '<small class="text-danger">', '</small>'); ?>
          </div>
          <a href="<?= base_url() . "admin/potonganGaji"; ?>" class="btn btn-warning">Kembali</a>
          <button class="btn btn-primary" type="submit">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>