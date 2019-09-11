</section>
    <!-- /.content -->
  </div>

<!--
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2019 <a href="http://dangote.com">DANGOTE CEMENT</a>.</strong> All rights
    reserved.
</footer>
 ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo assets('bower_components/jquery/dist/jquery.min.js') ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo assets('bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- Material Design -->
<script src="<?php echo assets('dist/js/material.min.js') ?>"></script>
<script src="<?php echo assets('dist/js/ripples.min.js') ?>"></script>
<script>
    $.material.init();
</script>
<!-- FastClick -->
<script src="<?php echo assets('bower_components/fastclick/lib/fastclick.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo assets('dist/js/adminlte.min.js') ?>"></script>

<!-- DataTables -->
<script src="<?php echo assets('bower_components/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo assets('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>

<!-- iCheck 1.0.1 -->
<script src="<?php echo assets('plugins/iCheck/icheck.min.js') ?>"></script>

<!-- InputMask -->
<script src="<?php echo assets('plugins/input-mask/jquery.inputmask.js') ?>"></script>
<script src="<?php echo assets('plugins/input-mask/jquery.inputmask.date.extensions.js') ?>"></script>
<script src="<?php echo assets('plugins/input-mask/jquery.inputmask.extensions.js') ?>"></script>

<!-- bootstrap datepicker -->
<script src="<?php echo assets('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>

<!-- Sparkline -->
<script src="<?php echo assets('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') ?>"></script>
<!-- jvectormap  -->
<script src="<?php echo assets('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>"></script>
<script src="<?php echo assets('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>"></script>
<!-- SlimScroll -->
<script src="<?php echo assets('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
<!-- ChartJS -->
<script src="<?php echo assets('bower_components/chart.js/Chart.js') ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo assets('dist/js/pages/dashboard2.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo assets('dist/js/demo.js') ?>"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>