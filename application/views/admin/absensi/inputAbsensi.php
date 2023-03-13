<div class="container-fluid">
  <h3>Form Input Kehadiran</h3>
  <div class="card">
    <div class="card-body">
      <form class="form-inline" method="get" action="<?= base_url() . "admin/inputKehadiran"; ?>">
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
        <button type="submit" class="btn btn-primary mr-2"><i class="fas fa-eye"></i> Generate</button>
      </form>
    </div>
  </div>
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
  <div class="alert alert-success mt-2" role="alert">
    Menampilkan Data Kehadiran Karyawan Bulan: <span class="font-weight-bold"><?= $bulan; ?></span> Tahun: <span class="font-weight-bold"><?= $tahun; ?></span>
  </div>
  <form action="<?= base_url() . "admin/inputKehadiran"; ?>" method="post">
    <div class="row">
      <div class="col-md-12">
        <div class="table-responsive">
          <button type="submit" name="submit" class="btn btn-success m-2">Simpan</button>
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Pegawai</th>
                <th>Nik</th>
                <th>Jenis Kelamin</th>
                <th>Jabatan</th>
                <th style="width: 18px; text-align : center;">Hadir</th>
                <th style="width: 18px; text-align : center;">sakit</th>
                <th style="width: 18px; text-align : center;">Alpha</th>
              </tr>
            </thead>
            <tbody>
              <?php $no =  1; ?>
              <?php foreach ($absensi as $dataAbsen) :  ?>
                <tr>
                  <input type="hidden" name="bulan[]" value="<?= $bulan; ?>">
                  <input type="hidden" name="tahun[]" value="<?= $tahun; ?>">
                  <input type="hidden" name="nik[]" value="<?= $dataAbsen['nik']; ?>">
                  <input type="hidden" name="nama_pegawai[]" value="<?= $dataAbsen['nama_pegawai']; ?>">
                  <input type="hidden" name="jk[]" value="<?= $dataAbsen['jk']; ?>">
                  <input type="hidden" name="jabatan[]" value="<?= $dataAbsen['jabatan']; ?>">
                  <td><?= $no++; ?></td>
                  <td><?= $dataAbsen['nama_pegawai']; ?></td>
                  <td><?= $dataAbsen['nik']; ?></td>
                  <td><?= $dataAbsen['jk'] ?></td>
                  <td><?= $dataAbsen['nama_jabatan'] ?></td>
                  <td><input type="number" name="jml_hadir[]" value="0" class="form-control"></td>
                  <td><input type="number" name="sakit[]" value="0" class="form-control"></td>
                  <td><input type="number" name="alfa[]" value="0" class="form-control"></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </form>
</div>