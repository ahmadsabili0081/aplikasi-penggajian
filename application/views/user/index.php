<?php
date_default_timezone_set('Asia/Jakarta');
$timeNow = date('H:i:s');
?>
<div class="row">
  <div class="col-md-12">
    <div class="card mb-3" style="max-width: 540px;">
      <div class="row no-gutters">
        <div class="col-md-4">
          <img style="height: 100%;" class="img-fluid" src="<?= base_url() . "assets/images/profile/$user[images]"; ?>">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <table class="table table-striped">
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
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><?= $user['jk']; ?></td>
              </tr>
              <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td><?= $user['nama_jabatan']; ?></td>
              </tr>
              <tr>
                <td>Email</td>
                <td>:</td>
                <td><?= $user['email']; ?></td>
              </tr>
              <tr>
                <td>Status</td>
                <td>:</td>
                <td><?= $user['status']; ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>