</section>
<!-- /.content -->
</div>

<!-- Delete Modal -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header font-weight-bold">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title text-bold">Delete</h3>
            </div>
            <div class="modal-body">
                <p> Do you really want to delete this Information ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger bg-red btn-sm" data-dismiss="modal">
                    <i class="fa fa-close"></i>&nbsp;Cancel
                </button>
                <button type="button" class="btn btn-success bg-green btn-sm" data-dismiss="modal"
                        onclick="deleteRow()">
                    <i class="fa fa-check"></i>&nbsp;Confirm
                </button>
            </div>
        </div>
    </div>
</div><!-- Delete Modal -->

<!-- LogOut Modal -->
<div class="modal fade" id="signout">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header font-weight-bold">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title text-bold">Sign Out</h3>
            </div>
            <div class="modal-body">
                <p> Do you really want to Sign Out ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger bg-red btn-sm" data-dismiss="modal">
                    <i class="fa fa-close"></i>&nbsp;Cancel
                </button>
                <button type="button" class="btn btn-success bg-green btn-sm" data-dismiss="modal" id="logOut">
                    <i class="fa fa-check"></i>&nbsp;Confirm
                </button>
            </div>
        </div>
    </div>
</div><!-- logOut Modal -->
 

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

<!-- Select2 -->
<script src="<?php echo assets('bower_components/select2/dist/js/select2.full.min.js') ?>"></script>

<!-- AdminLTE App -->
<script src="<?php echo assets('dist/js/adminlte.min.js') ?>"></script>

<!-- DataTables -->
<script src="<?php echo assets('bower_components/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo assets('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>

<!-- iCheck 1.0.1 -->
<script src="<?php echo assets('plugins/iCheck/icheck.min.js') ?>"></script>

<!-- bootstrap datepicker -->
<script src="<?php echo assets('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>
<!-- Jquery DataTable Plugin Js -->
<script src="<?php echo assets('plugins/jquery-datatable/jquery.dataTables.js') ?>"></script>
<script src="<?php echo assets('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') ?>"></script>
<script src="<?php echo assets('plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') ?>"></script>
<script src="<?php echo assets('plugins/jquery-datatable/extensions/export/buttons.flash.min.js') ?>"></script>
<script src="<?php echo assets('plugins/jquery-datatable/extensions/export/jszip.min.js') ?>"></script>
<script src="<?php echo assets('plugins/jquery-datatable/extensions/export/pdfmake.min.js') ?>"></script>
<script src="<?php echo assets('plugins/jquery-datatable/extensions/export/vfs_fonts.js') ?>"></script>
<script src="<?php echo assets('plugins/jquery-datatable/extensions/export/buttons.html5.min.js') ?>"></script>
<script src="<?php echo assets('plugins/jquery-datatable/extensions/export/buttons.print.min.js') ?>"></script>

<script>
    $(document).ready(function () {
        //  DataTable Initialisation
        $('#dataTable').DataTable({
            // 'paging': true,
            // 'lengthChange': true,
            // 'searching': true,
            // 'ordering': true,
            // 'info': true,
            // 'sorting': true,
            // 'autoWidth': true
            'paging': false,
            'lengthChange': false,
            'searching': false,
            'ordering': false,
            'info': false,
            'sorting': false,
            'autoWidth': false,
            dom: 'Bfrtip',
            responsive: true,
            buttons: [
                    {
                    extend: 'print',
                    titleAttr: 'print',
                    exportOptions:{
                        columns:':not(:last-child)'
                    }
                },
                {
                    extend: 'pdf',
                    titleAttr: 'pdf',
                    exportOptions:{
                        columns:':not(:last-child)'
                    }
                },
                {
                    extend: 'excel',
                    titleAttr: 'excel',
                    exportOptions:{
                        columns:':not(:last-child)'
                    }
                },
                {
                    extend: 'copy',
                    titleAttr: 'copy',
                    exportOptions:{
                        columns:':not(:last-child)'
                    }
                }
            ]
        });

        $('#table').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'sorting': true,
            'autoWidth': true,
            dom: 'Bfrtip',
            responsive: true,
            buttons: [
                    {
                    extend: 'print',
                    titleAttr: 'print',
                    exportOptions:{
                        columns:':not(:last-child)'
                    }
                },
                {
                    extend: 'pdf',
                    titleAttr: 'pdf',
                    exportOptions:{
                        columns:':not(:last-child)'
                    }
                },
                {
                    extend: 'excel',
                    titleAttr: 'excel',
                    exportOptions:{
                        columns:':not(:last-child)'
                    }
                },
                {
                    extend: 'copy',
                    titleAttr: 'copy',
                    exportOptions:{
                        columns:':not(:last-child)'
                    }
                }
            ]
        });
        $('.js-basic-example').DataTable({
            responsive: true
        });

        //Exportable table
        $('.js-exportable').DataTable({
            dom: 'Bfrtip',
            responsive: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]

        });
          // Open Form Box
          $('#insertForm').on('click', function () {
            let form = document.getElementsByTagName('form');
            form[0].reset();
            $('#id').removeAttr('value');
            $('#title').text('New ');
            document.getElementById('newForm').style.display = 'block';
        });
        // Close Form Box
        $(document).on('click', '#exitForm', function () {
            let form = document.getElementsByTagName('form');
            form[0].reset();
            $('#id').removeAttr('value');
            $('#title').text('New ');
            document.getElementById('newForm').style.display = 'none';
        });
                //iCheck for checkbox and radio inputs
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass   : 'iradio_minimal-blue'
            })
            //Red color scheme for iCheck
            $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass   : 'iradio_minimal-red'
            })

        //  Date picker
        $('#date').datepicker({
            autoclose: true
        });

        //  LogOut
        $('#logOut').on('click', function () {
            location.assign('../common/login.php')
        });

        //  Personnel Status
        $('#status').on('change', function () {
            let status = $('#status').val();

            if (status === 'Employee') {
                document.getElementById('emp').style.display = 'block';
                document.getElementById('int').style.display = 'none';
            } else {
                document.getElementById('int').style.display = 'block';
                document.getElementById('emp').style.display = 'none';
            }

        });

        // Automatic Alert Dismissal after 5 Seconds
        $(function () {
            setTimeout(function () {
                $(".alert").alert('close');
            }, 5000);
        });

        //Initialize Select2 Elements
        $('.select2').select2()
    });

    let key = '';
    let value = '';

    function setData(table, id) {
        key = table;
        value = id;
    }

    function deleteRow() {
        location.assign('delete.php?infos=' + key + '' + value);
    }

 
    function update(table, id, name, matricule, dept, ent) {
        document.getElementById('newForm').style.display = 'block';
        $('#id').val(id);
        $('#title').text('Update ');

        //  Enterprise Update
        if (table === 'enterprise')
            $('#enterprise').val(name);

        //  Department Update
        if (table === 'department')
            $('#department').val(name);

        //  Employee Update
        if (table === 'employee') {
            $('#employee').val(name);
            $('#matricule').val(matricule);
            $('#department').val(dept);
            $('#enterprise').val(ent);
        }

        //  User Update
        if (table === 'user') {
            $('#username').val(name);
            $('#password').val(matricule);
            $('#privilege').val(dept);
        }
    }

    function updateInd(id, names, dept, ent, status, marks, date) {
        document.getElementById('newForm').style.display = 'block';
        $('#id').val(id);
        $('#name').val(names);
        $('#department').val(dept);
        $('#enterprise').val(ent);
        $('#status').val(status);
        $('#mark').val(marks);
        $('#date').val(date);
        $('#title').text('Update ');    
    }
</script>

<script>
    $(document.body).ready(function () {
        /**
         * Ajax selection to fill the Table
         * Base on Date
         * Base on Search
         */
        $('#date, #department').on('change', function (e) {
            e.preventDefault();
            let department = $('#department').val();

            $.ajax({
                url: 'getEmployees.php',
                method: 'GET',
                data: {
                    department: department,
                },
                success: function (data) {
                    $('#data').html(data);
                }
            });
        });

        $('#search').on('input', function (e) {
            e.preventDefault();
            let department = $('#department').val();
            let search = $('#search').val();

            $.ajax({
                url: 'getEmployees.php',
                method: 'GET',
                data: {
                    department: department,
                    search: search
                },
                success: function (data) {
                    $('#data').html(data);
                }
            });
        });
    });
</script>

<script>
    $('#validate').on('click', function (e) {
        e.preventDefault();
        let validate = $('#validate').val();
        let trainer1 = $('#trainer1').val();
        let trainer2 = $('#trainer2').val();
        let trainer3 = $('#trainer3').val();
        let type = $('#type').val();
        let theme = $('#theme').val();
        let location = $('#location').val();
        let department = $('#department').val();
        let date = $('#date').val();

        let attendance = [];
        let attendances = document.getElementsByClassName("attendance");
        for (let i = 0; i < attendances.length; i++) {
            if (attendances[i].checked) {
                attendance.push(attendances[i].value);
            }
        }

        $.ajax({
            url: 'markAttendance.php',
            method: 'POST',
            data: {
                validate: validate,
                trainer1: trainer1,
                trainer2: trainer2,
                trainer3: trainer3,
                type: type,
                theme: theme,
                location: location,
                department: department,
                date: date,
                attendances: attendance
            },
            success: function (data) {
                $('#data').empty();
                alert(data);
            }
        });
    });
</script>

</body>
</html>
