
  <div class="modal fade" id="column">
   <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header font-weight-bold">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title text-bold">Select columns</h3>
            </div>
            <div class="modal-body">
            <div class="checkbox">
                    <label>
                        <input type="checkbox" value="1"> Employee Name
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="2"> Department
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="3"> Enterprise
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="4"> Location
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="5"> Topic
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="6"> Trainer
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="7"> Training Type
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="8"> Date
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- jQuery 3 -->
<script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Material Design -->
<script src="assets/dist/js/material.min.js"></script>
<script src="assets/dist/js/ripples.min.js"></script>
<script>
    $.material.init();
</script>
<!-- bootstrap datepicker -->
<script src="assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!-- Select2 -->
<script src="assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- Jquery DataTable Plugin Js -->
<script src="assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="assets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
<!-- print charts -->
<script src="include/PrintContent.js"></script>
<script>
    $(document).ready(function () {
        //  DataTable Initialisation
        let col = $('#table').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'sorting': true,
            'autoWidth': true,
            dom: 'Bfrtip',
            responsive: true,
            buttons: [ 'print', 'pdf', 'excel', 'copy' ]
        });

         //  DataTable Initialisation
         let col2 = $('#dtable').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'sorting': true,
            'autoWidth': true,
            dom: 'Bfrtip',
            responsive: true,
            buttons: [ 'print', 'pdf', 'excel', 'copy' ]
        });

        $('input[type="checkbox"]').click(function () {
            if ($(this).is(":checked")) {
                hideColumn($(this).val());
            } else {
                unHideColumn($(this).val());
            }
        });

        function hideColumn(index) {
            $('input:checkbox:checked').each(function () {
                col.column(index).visible(false);
            });
        }

        function unHideColumn(index) {
            col.column(index).visible(true);
        }

        //Initialize Select2 Elements
        $('.select2').select2()
        // Open index box
    });
</script>
<script>
    $(document.body).ready(function () {
        /**
         * Ajax selection to fill the Table
         * Base on Date
         * Base on Search
         */
        $(' #employee').on('change', function (e) {
            e.preventDefault();
            let empname = $('#employee').val();

            $.ajax({
                url: 'loadEmployee.php',
                method: 'GET',
                data: {
                    empname: empname,
                },
                success: function (data) {
                    $('#data').html(data);
                }
            });
        });
    });
</script>
<script>
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

        //Date picker
        $('#date1, #date2').datepicker({
            autoclose: true
        })

    function showUser(str) {
    if (str == "") {
        document.getElementById("display").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("display").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","include/perEmployee.php?q="+str,true);
        xmlhttp.send();
    }
    
}


  function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}         

</script>
</body>
</html>