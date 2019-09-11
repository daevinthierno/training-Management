  <!-- DataTables -->
     <link rel="stylesheet" href="assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<?php
include 'config.php';
include 'function.php';
$empname ='';
   
        $empID = intval($_GET['q']);
        $sql = "SELECT * FROM employee WHERE empID = $empID";
        $res = mysqli_query($conn,$sql);
        if($res){
          while ($ro = mysqli_fetch_array($res)) {
            # code...
                $empname = $ro['empname'];
                $depID = $ro['depID'];
                $enterpriseID = $ro['enterpriseID'];
               }
                $d  = "SELECT * from department where depID = $depID";
                $re =  mysqli_query($conn,$d);
          if($re){
            echo '<h3> Records For :'.$empname.'</h3><br>';
                while($dep = mysqli_fetch_array($re)){
                  $depname = $dep['depname'];
                }
                echo "<h4>Department: ".$depname."</h4>";
          }
            $e  = "SELECT * from enterprise where enterpriseID = $enterpriseID";
                $te =  mysqli_query($conn,$e);
          if($te){
                while($tep = mysqli_fetch_array($te)){
                  $enterprisename = $tep['enterprisename'];
                }
                echo "<h4>Enterprise: ".$enterprisename."</h4><br><br>";
          }

          
        }
        
         ?>  
                <table id="dtable" class="table table-striped table-responsive-xl">
                  <thead>
                        <tr>
                            <th>N<sup>0</sup></th>
                            <th>Training Type</th>
                            <th>Topic</th>
                            <th>Trainer</th>
                            <th>Attendance</th>
                            <th>Date</th>
                        </tr>
                    </thead id = "display">
                    <tbody>
         <?php
        $sql_h = "SELECT t.trainingType,t.theme, t.date_and_time as dates ,t.trainer1,t.trainer2,t.trainer3,a.status from attendance as a, training as t where empID = $empID  and t.trainingID = a.trainingID ORDER BY t.date_and_time DESC ";
        $result = mysqli_query($conn,$sql_h);
        if($result){
            
                $i = 0;
              while ($row = mysqli_fetch_array($result)) {
                # code...$date = DateTime::createFromFormat('m/d/Y', $date2);
                    //$date = $date->format('Y-m-d');
                    echo '<tr><td>'.++$i.'</td><td>'.$row['trainingType'].'</td><td>'.$row['theme'].'</td><td>'.$row['trainer1'].', '.$row['trainer2'].' and '.$row['trainer3'].'</td><td>'.$row['status'].'</td><td>'.$row['dates'].'</td></tr>';
                     }

             echo "</tbody></table>";
        }else{
            var_dump($sql_h);
          }
include '../footer1.php';
?>
<script type="text/javascript">
$(document).ready(function () {
        //  DataTable Initialisation
        let col = $('#table2').DataTable({
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
      });

</script>        