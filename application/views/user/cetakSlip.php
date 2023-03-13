<?php
$tglMasuk = $user['tgl_masuk'];
$tgl_masuk_obj = DateTime::createFromFormat('Y-m-d', $tglMasuk);
$tgl_masuk_new = $tgl_masuk_obj->format('d F Y');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title; ?></title>
  <link href="<?= base_url() . "assets/vendor/fontawesome-free/css/all.min.css" ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url() . "assets/css/sb-admin-2.min.css" ?>" rel="stylesheet">
  <link href="<?= base_url() . "assets/vendor/datatables/dataTables.bootstrap4.min.css" ?>" rel="stylesheet">
  <style>
    .tablee {
      width: 30%;
    }

    .tablee td {
      border: none;
    }

    table.tandaTangan {
      width: 100%;
    }

    table.tandaTangan td {
      border: none;
    }
  </style>
</head>

<body>
  <div class="container">
    <center>
      <h1>PT.BANK INDONESIA JAYA</h1>
      <h3>Slip Gaji</h3>
    </center>
    <table class="tablee">
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?= $user['nama_pegawai']; ?></td>
      </tr>
      <tr>
        <td>Nik</td>
        <td>:</td>
        <td><?= $user['nik']; ?></td>
      </tr>
      <tr>
        <td>Jebatan</td>
        <td>:</td>
        <td><?= $user['nama_jabatan']; ?></td>
      </tr>
      <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td><?= $user['jk']; ?></td>
      </tr>
      <tr>
        <td>Tanggal Masuk</td>
        <td>:</td>
        <td><?= $tgl_masuk_new; ?></td>
      </tr>
      <tr>
        <td>Bulan</td>
        <td>:</td>
        <td><?= date('F'); ?></td>
      </tr>
      <tr>
        <td>Tahun</td>
        <td>:</td>
        <td><?= date('Y'); ?></td>
      </tr>
    </table>
    <br>
    <br>
    <br>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th style="width:2%;">No</th>
          <th>Keterangan</th>
          <th>Jumlah</th>
        </tr>
      </thead>
      <tbody>

        <tr>
          <td>1</td>
          <td>Gaji Pokok</td>
          <td>Rp.<?= number_format($user['gaji_pokok']); ?></td>
        </tr>
        <tr>
          <td>2</td>
          <td>Tj.Transportasi</td>
          <td>Rp.<?= number_format($user['tunjangan']); ?></td>
        </tr>
        <tr>
          <td>3</td>
          <td>Tj. Uang Makan</td>
          <td>Rp.<?= number_format($user['uang_makan']); ?></td>
        </tr>
        <tr>
          <td>4</td>
          <td>Potongan</td>
          <td>Rp.<?= ($user['alfa'] > 0 ? number_format((intval($user['alfa']) * intval($potongan['jml_potongan']))) : "-"); ?></td>
        </tr>
        <tr>
          <td colspan="2" style="text-align:center;">Jumlah</td>
          <td>Rp.<?= number_format($user['gaji_pokok'] + $user['tunjangan'] + $user['uang_makan'] - (intval($user['alfa']) * intval($potongan['jml_potongan']))) ?></td>
        </tr>
      </tbody>
    </table>
    <br>
    <br>
    <br>
    <br>
    <br>
    <table class="tandaTangan">
      <tr>
        <td></td>
        <td width="250px">
          <p>Tangerang, <?= date('d F Y'); ?></p>
          <p style="margin-top: -15px; text-align: center">Mengetahui Ditektur,</p>
          <br>
          <br>
          <p style="text-align: center;"><u><b>Ahmad Sabili Alghifari</b></u></p>
        </td>
      </tr>
    </table>
  </div>
  <script>
    window.print();
  </script>
  <script src="<?= base_url() . "assets/vendor/jquery/jquery.min.js"; ?>"></script>
  <script src="<?= base_url() . "assets/vendor/bootstrap/js/bootstrap.bundle.min.js" ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url() . "assets/vendor/jquery-easing/jquery.easing.min.js" ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url() . "assets/js/sb-admin-2.min.js"; ?>"></script>
</body>

</html>