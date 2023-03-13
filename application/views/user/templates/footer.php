</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; PT.BANK INDONESIA JAYA <?= date('Y'); ?></span>
    </div>
  </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Apakah Anda yakin ingin Logout</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="<?= base_url() . "user/logout"; ?>">Logout</a>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url() . "assets/vendor/jquery/jquery.min.js"; ?>"></script>
<script src="<?= base_url() . "assets/vendor/bootstrap/js/bootstrap.bundle.min.js" ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url() . "assets/vendor/jquery-easing/jquery.easing.min.js" ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url() . "assets/js/sb-admin-2.min.js"; ?>"></script>
<!-- Page level plugins -->
<script src="<?= base_url() . "assets/vendor/datatables/jquery.dataTables.min.js" ?>"></script>
<script src="<?= base_url() . "assets/vendor/datatables/dataTables.bootstrap4.min.js" ?>"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url() . "assets/js/demo/datatables-demo.js" ?>"></script>
<script>
  function terimaGambar() {
    let fileName = document.querySelector('.custom-file-input');
    let labelName = document.querySelector('.custom-file-label');

    fileName.addEventListener('change', () => {
      let valueNew = fileName.value.split('\\').pop();
      labelName.innerText = valueNew;
    });
  }
  terimaGambar();
</script>
<script>
  let jamTampil = document.querySelector('.jam');
  let date = new Date();
  let jam = date.getHours();
  let menit = date.getMinutes();
  let detik = date.getSeconds();
  setInterval(() => {
    jamTampil.innerHTML = `${jam  < 10 ? "0" + jam : jam }:${menit < 10 ? "0" + menit : menit}:${detik < 10 ? "0" + detik : detik }`
  }, 1000);
</script>
</body>

</html>