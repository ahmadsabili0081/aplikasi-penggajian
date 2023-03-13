<?php if ((isset($_GET['bulan']) && $_GET['bulan'] !== "") && (isset($_GET['tahun']) && $_GET['tahun'] !== "")) :  ?>
  <?php
  $bulan = $_GET['bulan'];
  $tahun = $_GET['tahun'];
  ?>
<?php else : ?>
  <?php
  $bulan = date('m');
  $tahun = date('Y');
  ?>
<?php endif; ?>
<div class="col-md-12">
  <h3><?= $title; ?></h3>
  <div class="card mt-5">
    <div class="card-header">
      Filter Data Penggajian
    </div>
    <div class="card-body">
      <form class="form-inline" method="get" action="<?= base_url() . "admin/dataPenggajian"; ?>">
        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Bulan</label>
        <select name="bulan" class="form-control col-md-4 mr-4" id="inlineFormCustomSelectPref">
          <option value="" selected>--Pilih Bulan--</option>
          <option value="01">Januari</option>
          <option value="02">Februari</option>
          <option value="03">Maret</option>
          <option value="04">April</option>
          <option value="05">Mei</option>
          <option value="06">Juni</option>
          <option value="07">Juli</option>
          <option value="08">Agustus</option>
          <option value="09">September</option>
          <option value="10">Oktober</option>
          <option value="11">November</option>
          <option value="12">Desember</option>
        </select>
        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Tahun</label>
        <select name="tahun" class="form-control col-md-2 mr-4" id="inlineFormCustomSelectPref">
          <?php for ($i = 2020; $i <= date('Y'); $i++) : ?>
            <option value="<?= $i; ?>"><?= $i; ?></option>
          <?php endfor; ?>
        </select>
        <button type="submit" class="btn btn-primary mr-2"><i class="fas fa-eye"></i> Tampilkan Data</button>
        <?php if (count($gajiPegawai) > 0) :  ?>
          <a target="_blank" href="<?= base_url() . "admin/cetakPenggajian/$bulan/$tahun"; ?>" class="btn btn-success"><i class="fas fa-print"></i> Cetak Daftar Gaji</a>
        <?php else :  ?>
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-print"></i> Cetak Daftar Gaji</a>
          </button>
        <?php endif; ?>
      </form>
    </div>
  </div>
  <div class="alert alert-success mt-2" role="alert">
    Menampilkan Data Penggajian Karyawan Bulan: <span class="font-weight-bold"><?= $bulan; ?></span> Tahun: <span class="font-weight-bold"><?= $tahun; ?></span>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">Nama Pegawai</th>
              <th class="text-center">Nik</th>
              <th class="text-center">Jenis Kelamin</th>
              <th class="text-center">Jabatan</th>
              <th class="text-center">Gaji Pokok</th>
              <th class="text-center">Tj.Transportasi</th>
              <th class="text-center">Uang Makan</th>
              <th class="text-center">Potongan</th>
              <th class="text-center">Total Gaji</th>
            </tr>
          </thead>
          <tbody>

            <?php $potonganGaji = 0;
            foreach ($potongan as $p) {

              $potonganGaji = intval($p['jml_potongan']);
            } ?>
            <?php $no = 1;
            foreach ($gajiPegawai as $gaji) : ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $gaji['nama_pegawai'];  ?></td>
                <td><?= $gaji['nik'];  ?></td>
                <td><?= $gaji['jk'];  ?></td>
                <td><?= $gaji['nama_jabatan']; ?></td>
                <td>Rp.<?= number_format($gaji['gaji_pokok']); ?></td>
                <td>Rp.<?= number_format($gaji['tunjangan']); ?></td>
                <td>Rp.<?= number_format($gaji['uang_makan']); ?></td>
                <td>Rp.<?= ($gaji['alfa'] > 0 ? number_format((intval($gaji['alfa']) * intval($potonganGaji))) : "-"); ?></td>
                <td>Rp. <?= number_format($gaji['gaji_pokok'] + $gaji['tunjangan'] + $gaji['uang_makan'] - (intval($gaji['alfa']) * intval($potonganGaji))); ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: center;">
        <u>
          <h4>DATA PENGGAJIAN KARYAWAN</h4>
        </u>
        tidak bisa dicetak. Karena anda belum Menginput Bulan & Tahun yang ingin di cetak
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>