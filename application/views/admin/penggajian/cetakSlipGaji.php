<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title; ?></title>
  <!-- Custom fonts for this template-->
  <link href="<?= base_url() . "assets/vendor/fontawesome-free/css/all.min.css" ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url() . "assets/css/sb-admin-2.min.css" ?>" rel="stylesheet">
  <link href="<?= base_url() . "assets/vendor/datatables/dataTables.bootstrap4.min.css" ?>" rel="stylesheet">
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
    }

    th {
      font-size: 20px;
    }

    table th,
    td {
      border: 1px solid black;
      border-collapse: collapse;
      padding: 5px;
    }

    table.tandaTangan td {
      border: none;
    }

    table.biodata td {
      border: none;
    }

    .baris_pertama {
      width: 150px;
    }

    .baris_kedua {
      width: 5px;
    }
  </style>
</head>

<body>
  <div class="container">
    <center>
      <u>
        <h1>PT.BANK INDONESIA JAYA</h1>
      </u>
      <u>
        <h2>SLIP GAJI</h2>
      </u>
    </center>
    <br>
    <br>
    <table class="biodata">
      <tr>
        <td class="baris_pertama">Nama Pegawai</td>
        <td class="baris_kedua">:</td>
        <td><?= ucwords($gajiPegawai['nama_pegawai']); ?></td>
      </tr>
      <tr>
        <td>Nik</td>
        <td>:</td>
        <td><?= $gajiPegawai['nik']; ?></td>
      </tr>
      <tr>
        <td>Jabatan</td>
        <td>:</td>
        <td><?= ucwords($gajiPegawai['nama_jabatan']); ?></td>
      </tr>
      <tr>
        <td>Bulan</td>
        <td>:</td>
        <td><?= $bulan; ?></td>
      </tr>
      <tr>
        <td>Tahun</td>
        <td>:</td>
        <td><?= $tahun; ?></td>
      </tr>
    </table>
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
        <?php
        $potonganKar;
        foreach ($potongan as $p) {
          $potonganKar = $p['jml_potongan'];
        }
        ?>
        <tr>
          <td>1</td>
          <td>Gaji Pokok</td>
          <td>Rp.<?= number_format($gajiPegawai['gaji_pokok']); ?></td>
        </tr>
        <tr>
          <td>2</td>
          <td>Tj.Transportasi</td>
          <td>Rp.<?= number_format($gajiPegawai['tunjangan']); ?></td>
        </tr>
        <tr>
          <td>3</td>
          <td>Tj. Uang Makan</td>
          <td>Rp.<?= number_format($gajiPegawai['uang_makan']); ?></td>
        </tr>
        <tr>
          <td>4</td>
          <td>Potongan</td>
          <td>Rp.<?= ($gajiPegawai['alfa'] > 0 ? number_format((intval($gajiPegawai['alfa']) * intval($potonganKar))) : "-"); ?></td>
        </tr>
        <tr>
          <td colspan="2" style="text-align:center;">Jumlah</td>
          <td>Rp.<?= number_format($gajiPegawai['gaji_pokok'] + $gajiPegawai['tunjangan'] + $gajiPegawai['uang_makan'] + (intval($gajiPegawai['alfa']) * intval($potonganKar))) ?></td>
        </tr>
      </tbody>
    </table>
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