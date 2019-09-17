   <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Sistem Penerimaan Karyawan <?php echo date('Y') ?></span>
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
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo base_url('auth/logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- start exam Modal-->
  <div class="modal fade" id="start_exam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Are you ready to take this exam ?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
          <a class="btn btn-primary" href="<?php echo base_url('welcome'); ?>">Ready</a>
        </div>
      </div>
    </div>
  </div>

  


  

  <!-- Bootstrap core JavaScript-->

  <script src="<?php echo base_url(); ?>assets/sbadmin/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>assets/sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url(); ?>assets/sbadmin/js/sb-admin-2.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> -->
   
  <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

 

  

<!-- <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script> -->


  <!-- j query -->

  <script type="text/javascript">
      $('.custom-file-input').on('change', function() {
      let fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
  </script>


  <script>
    $('.form-check-input').on('click', function() {
      const menuId = $(this).data('menu');
      const roleId = $(this).data('role');

      $.ajax({
        url: "<?php echo base_url('admin/change_access'); ?>",
        type: 'post',
        data: {
          menuId: menuId,
          roleId: roleId
        },
        success: function(){
          document.location.href = "<?php echo base_url('admin/role_access/'); ?>" + roleId;
        } 
      });

    });

  </script>

  <script type="text/javascript">
   $(function(){
    $("#tgl_awal").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
    });
   });
  </script>

  <script type="text/javascript">
   $(function(){
    $("#tgl_akhir").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
    });
   });
  </script>

  <script type="text/javascript">
   $(function(){
    $("#dateBirth").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
    });
   });
  </script>

  <script type="text/javascript">
   $(function(){
    $("#graduation").datepicker({
        format: 'yyyy',
        autoclose: true,
        todayHighlight: true,
    });
   });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
    $('#register').DataTable();
} );
  </script>


<script type="text/javascript">
  function Angkasaja(evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57))
  return false;
  return true;
  }
</script>




</body>

</html>