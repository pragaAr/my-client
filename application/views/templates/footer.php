<footer class="main-footer">
  <div class="footer-left">
    Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="//nauval.in/">Muhamad Nauval Azhar</a>
  </div>
  <div class="footer-right">
    2.3.0
  </div>
</footer>
</div>
</div>
</div>

<!-- General JS Scripts -->
<script src="//code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="<?= base_url('assets/') ?>assets/js/stisla.js"></script>
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<!-- Template JS File -->
<script src="<?= base_url('assets/') ?>assets/js/scripts.js"></script>
<script src="<?= base_url('assets/') ?>assets/js/custom.js"></script>

<!-- <script src="<?= base_url('assets/chart.js/chart.min.js') ?>"></script> -->
<!-- Page Specific JS File -->
<script src="<?= base_url('assets/') ?>assets/js/page/index-0.js"></script>
<script src="<?= base_url('assets/swal/sweetalert2.all.min.js') ?>"></script>
<script src="<?= base_url('assets/swal/myscript.js') ?>"></script>

<script>
  $(document).ready(function() {
    $('#dataTables').DataTable({
      "processing": true,
      "serverside": true,
      buttons: ['print', 'excel', 'pdf'],
      dom: "<'row px-2 px-md-4 pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
        "<'row'<'col-md-12'tr>>" +
        "<'row px-2 px-md-4 py-3'<'col-md-5'i><'col-md-7'p>>",
      lengthMenu: [
        [5, 10, 25, 50, 100, -1],
        [5, 10, 25, 50, 100, "All"]
      ],
      columnDefs: [{
        targets: -1,
        orderable: false,
        searchable: false
      }]
    });
  });
</script>

<script>
  $('#addAnggota').on('shown.bs.modal', function() {
    $('#nama').trigger('focus')
  })
  $('#addPinjam').on('shown.bs.modal', function() {
    $('#anggota_id').trigger('focus')
  })
  $('#newAngsuranModal').on('shown.bs.modal', function() {
    $('#tgl_bayar').trigger('focus')
  })
  $('#addSimpananPokok').on('shown.bs.modal', function() {
    $('#anggota_id').trigger('focus')
  })
  $('#addSimpananWajib').on('shown.bs.modal', function() {
    $('#anggota_id').trigger('focus')
  })
  $('#addSimpananSukarela').on('shown.bs.modal', function() {
    $('#anggota_id').trigger('focus')
  })
</script>

</body>

</html>