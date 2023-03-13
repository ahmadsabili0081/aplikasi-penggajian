<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title; ?></title>
  <style>
    @media print {
      @page {
        size: landscape;
      }
    }

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

    tr:nth-child(even) {
      background-color: gray;
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
      <h2>Tabel Data Penggajian</h2>
    </center>
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Pegawai</th>
          <th>Nik</th>
          <th>Jenis Kelamin</th>
          <th>Jabatan</th>
          <th>Gaji Pokok</th>
          <th>Tj.Transportasi</th>
          <th>Uang Makan</th>
          <th>Potongan</th>
          <th>Total Gaji</th>
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
    <br>
    <br>
    <br>

    <table class="tandaTangan">
      <tr>
        <td></td>
        <td width="200px">
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
</body>

</html>