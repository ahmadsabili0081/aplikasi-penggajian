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
      <h2>Data Absensi</h2>
    </center>
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Pegawai</th>
          <th>Nik</th>
          <th>Jenis Kelamin</th>
          <th>Jabatan</th>
          <th>Hadir</th>
          <th>sakit</th>
          <th>Alpha</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1;
        foreach ($absensiPegawai as $absensi) : ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $absensi['nama_pegawai']; ?></td>
            <td><?= $absensi['nik']; ?></td>
            <td><?= $absensi['jk'] ?></td>
            <td><?= $absensi['nama_jabatan'] ?></td>
            <td><?= $absensi['jml_hadir'] ?></td>
            <td><?= $absensi['sakit']; ?></td>
            <td><?= $absensi['alfa']; ?></td>
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